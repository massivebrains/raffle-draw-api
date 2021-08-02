<?php

namespace App\Services;

use App\Contracts\Repository\IOAuth;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IUserPasswordRecovery;
use App\Contracts\Services\IEmailService;
use App\Contracts\Services\IPasswordRecoveryService;
use App\DTOs\CreateUserVerificationDTO;
use App\DTOs\UpdateUserEmailVerifyDTO;
use App\MailTemplate\ResetPasswordTemplate;
use App\Plugins\PUGXShortId\Shortid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class PasswordRecoveryService extends BaseService implements IPasswordRecoveryService
{

    private $user;
    private $userPasswordResetRepo;
    private $userRepo;
    private $oauthRepo;
    private $EmailService;

    public function __construct(
        IUser $userRepo,
        IOAuth $oauthRepo,
        Request $request,
        IUserPasswordRecovery $userPasswordResetRepo,
        IEmailService $EmailService
    ) {
        $this->userRepo = $userRepo;
        $this->oauthRepo = $oauthRepo;
        $this->userPasswordResetRepo = $userPasswordResetRepo;
        $this->EmailService = $EmailService;
        $this->request = $request;
        $this->user = $request->user('api');
    }


    public function generateCode()
    {
        return  Shortid::generate(30, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZAQ");
    }

    public function hashCode($rawCode)
    {
        return Hash::make($rawCode);
    }

    public function compareCode($rawCode, $hashedCode)
    {
        return Hash::check($rawCode, $hashedCode);
    }

    public function generatePassword($plainPassword)
    {
        return Hash::make($plainPassword);
    }

    public function generateSecret($plainPassword)
    {
        return base64_encode(hash_hmac('sha256', $plainPassword, 'secret', true));
    }


    public function create(string $email)
    {

        $dbUser = $this->userRepo->getByEmail($email);

        if (!$dbUser) {
            $response_message = $this->customHttpResponse(400, 'User with this email does not exist.');
            return $response_message;
        }

        DB::beginTransaction();
        try {

            $userID = $dbUser->getOriginal('id');
            $this->userPasswordResetRepo->disableAllActiveUnused($userID);
            $code = $this->generateCode();

            $createUserVerifyInputData = CreateUserVerificationDTO::fromRequest(['user_id' =>  $userID, 'code' => $code]);
            $this->userPasswordResetRepo->create($createUserVerifyInputData);

            //send Mails
            $detail = ['name' => $dbUser->username, 'company' => 'Land Lotto', 'verify_code' => $code, 'email' => $email];
            $htmlMail = ResetPasswordTemplate::getHtml($detail);
            $this->EmailService->sendMail($dbUser->email, "Reset your {$detail['company']} password", $htmlMail);

            DB::commit();

            $response_message = $this->customHttpResponse(200, 'Code generated successful.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }


    public function verify($code)
    {

        $validCode = $this->userPasswordResetRepo->validCode($code);

        if (!$validCode) {
            $response_message = $this->customHttpResponse(400, 'Code does not exist or expired.');
            return $response_message;
        }

        $response_message = $this->customHttpResponse(200, 'Code is valid. User can proceed.');
        return $response_message;
    }


    public function changePassword($code, $password)
    {

        $validCode = $this->userPasswordResetRepo->validCode($code);

        if (!$validCode) {
            $response_message = $this->customHttpResponse(400, 'Code does not exist or expired.');
            return $response_message;
        }

        DB::beginTransaction();
        try {

            $this->userPasswordResetRepo->markUsed($code, $validCode->user_id);

            $newHashedPassword = $this->generatePassword($this->request->password);
            $newSecret = $this->generateSecret($this->request->password);

            $this->oauthRepo->updateSecret($validCode->user_id, $newSecret);
            $this->userRepo->updatePassword($validCode->user_uuid, $newHashedPassword);

            DB::commit();

            $response_message = $this->customHttpResponse(200, 'Password has been reset successfully.Login to continue.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }
}
