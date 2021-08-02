<?php

namespace App\Services;

use App\Contracts\Repository\IOAuth;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IUserVerification;
use App\Contracts\Repository\IWallet;
use App\Contracts\Services\IEmailService;
use App\Contracts\Services\IUserService;
use App\DTOs\CreateUserDTO;
use App\DTOs\CreateUserVerificationDTO;
use App\DTOs\CreateWalletDTO;
use App\DTOs\OAuthDTO;
use App\DTOs\UpdateUserDTO;
use App\MailTemplate\RegistrationTemplate;
use App\Plugins\PUGXShortId\Shortid;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserService extends BaseService implements IUserService
{

    private $user;
    private $userRepo;
    private $userVerifyRepo;
    private $oauthRepo;
    private $walletRepo;
    private $password;
    private $request;
    private $payload;
    private $EmailService;

    public function __construct(
        IUser $userRepo,
        Request $request,
        IWallet $walletRepo,
        IOAuth $oauthRepo,
        IUserVerification $userVerifyRepo,
        IEmailService $EmailService
    ) {
        $this->userRepo = $userRepo;
        $this->userVerifyRepo = $userVerifyRepo;
        $this->oauthRepo = $oauthRepo;
        $this->walletRepo = $walletRepo;
        $this->EmailService = $EmailService;
        $this->request = $request;
        $this->user = $request->user('api');
    }

    public function create()
    {

        $this->password = $this->request->get('password');
        $this->payload = $this->request->input();
        return $this->processCreate();
    }

    public function update($id)
    {

        $this->user = $this->request->user('api');
        $this->payload = $this->request->all();
        return $this->processUpdate($id);
    }

    public function find($id)
    {
        $result = $this->userRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->userRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function findAllAdmin()
    {
        $result = $this->userRepo->getAllAdmin();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function findAllPlayers()
    {
        $result = $this->userRepo->getAllPlayers();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function hasDBData($handle)
    {
        return $handle ? true : false;
    }

    public function recordExist($id)
    {
        return $this->userRepo->find($id);
    }

    public function generateCode()
    {
        return  Shortid::generate(30, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZAQ");
    }


    public function generatePassword($plainPassword)
    {
        return Hash::make($plainPassword);
    }

    public function generateSecret($plainPassword)
    {
        return base64_encode(hash_hmac('sha256', $plainPassword, 'secret', true));
    }

    public function processCreate()
    {


        try {

            $this->payload['password'] = $this->generatePassword($this->password);
            $this->payload['plain_password'] = $this->password;


            //check email and full name exist
            $check = $this->userRepo->nameByEmailExist($this->payload);

            if ($this->hasDBData($check)) {

                $response_message = $this->customHttpResponse(405, 'User already exist.');
                return $response_message;
            }


            //check username exist
            $checkUsername = $this->userRepo->nameByUsernameExist($this->payload);

            if ($this->hasDBData($checkUsername)) {

                $response_message = $this->customHttpResponse(405, 'User already exist.');
                return $response_message;
            }


            /**
             * Hit the repository now and create the necessary default setup for this user. E.g User profile, Wallet, etc
             * All wrapped within a Transaction for integrity purposes. Commit when successful and Rollback otherwise(any slight error).
             */

            DB::beginTransaction();
            try {
                $code = $this->generateCode();

                $createUserInputData = CreateUserDTO::fromRequest($this->payload);
                $regData = $this->userRepo->create($createUserInputData);

                $createUserVerifyInputData = CreateUserVerificationDTO::fromRequest(['user_id' => $regData->id, 'code' => $code]);
                $this->userVerifyRepo->create($createUserVerifyInputData);

                $this->payload['user_id'] = $regData->id;
                $createOAuthInputData = OAuthDTO::fromRequest($this->payload);
                $oauthData = $this->oauthRepo->create($createOAuthInputData);

                $createWalletInputData = CreateWalletDTO::fromRequest(['user_id' => $regData->id]);
                $walletData = $this->walletRepo->create($createWalletInputData);

                //send Mails
                $detail = ['name' => $this->request->username, 'company' => 'Land Lotto', 'verify_code' => $code];
                $htmlMail = RegistrationTemplate::getHtml($detail);
                $this->EmailService->sendMail($this->request->email, 'Welcome :: Activation Required.', $htmlMail);

                DB::commit();


                $response_message = $this->customHttpResponse(200, 'Registration successful.');
                return $response_message;
            } catch (\Throwable $th) {

                DB::rollBack();
                Log::info("One of the DB statements failed. Error: " . $th);

                $response_message = $this->customHttpResponse(500, 'Transaction Error.');
                return $response_message;
            }
        } catch (\Throwable $th) {

            Log::info("One of the DB statements failed. Error: " . $th);
            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }



    public function processUpdate($id)
    {

        $exist = $this->recordExist($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        try {

            DB::beginTransaction();
            try {
                if ($this->request->has('password')) {

                    $newHashedPassword = $this->generatePassword($this->request->password);
                    $newSecret = $this->generateSecret($this->request->password);

                    $this->payload['password'] = $newHashedPassword;

                    $entityInternalID = $exist->getOriginal('id');
                    $this->oauthRepo->updateSecret($entityInternalID, $newSecret);
                }

                $updateUserInputData = UpdateUserDTO::fromRequest($this->payload);
                $this->userRepo->update($id, $updateUserInputData);

                $updatedData = $this->userRepo->showByUsername($this->user->username);

                DB::commit();


                $response_message = $this->customHttpResponse(200, 'Update successful.', $updatedData);
                return $response_message;
            } catch (\Throwable $th) {

                DB::rollBack();
                Log::info("One of the DB statements failed. Error: " . $th);

                $response_message = $this->customHttpResponse(500, 'Transaction Error.');
                return $response_message;
            }
        } catch (\Throwable $th) {

            Log::info("One of the DB statements failed. Error: " . $th);
            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }

    public function softDelete($userID)
    {
        $exist = $this->recordExist($userID);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        if ($this->user->uuid === $userID) {
            $response_message = $this->customHttpResponse(400, 'You cannot remove yourself.');
            return $response_message;
        }

        try {
            $this->userRepo->delete($userID);

            $response_message = $this->customHttpResponse(200, 'User deleted successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }
}
