<?php

namespace App\Services;

use App\Contracts\Repository\IOAuth;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IWallet;
use App\Contracts\Services\IUserService;
use App\DTOs\CreateUserDTO;
use App\DTOs\CreateWalletDTO;
use App\DTOs\OAuthDTO;
use App\DTOs\UpdateUserDTO;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class UserService extends BaseService implements IUserService
{

    private $userRepo;
    private $oauthRepo;
    private $walletRepo;
    private $password;
    private $request;
    private $payload;

    public function __construct(IUser $userRepo, Request $request, IWallet $walletRepo, IOAuth $oauthRepo)
    {
        $this->userRepo = $userRepo;
        $this->oauthRepo = $oauthRepo;
        $this->walletRepo = $walletRepo;
        $this->request = $request;
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


    public function hasDBData($handle)
    {
        return $handle ? true : false;
    }

    public function recordExist($id)
    {
        return $this->userRepo->find($id);
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

                $createUserInputData = CreateUserDTO::fromRequest($this->payload);
                $regData = $this->userRepo->create($createUserInputData);

                $this->payload['user_id'] = $regData->id;
                $createOAuthInputData = OAuthDTO::fromRequest($this->payload);
                $oauthData = $this->oauthRepo->create($createOAuthInputData);

                $createWalletInputData = CreateWalletDTO::fromRequest(['user_id' => $regData->id]);
                $walletData = $this->walletRepo->create($createWalletInputData);

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

                DB::commit();


                $response_message = $this->customHttpResponse(200, 'Update successful.');
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
}
