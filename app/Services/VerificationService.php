<?php

namespace App\Services;

use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IUserVerification;
use App\Contracts\Services\IEmailService;
use App\Contracts\Services\IVerificationService;
use App\DTOs\CreateUserVerificationDTO;
use App\DTOs\UpdateUserEmailVerifyDTO;
use App\MailTemplate\RegistrationTemplate;
use App\Plugins\PUGXShortId\Shortid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class VerificationService extends BaseService implements IVerificationService
{

    private $user;
    private $userVerifyRepo;
    private $userRepo;
    private $EmailService;

    public function __construct(
        IUser $userRepo,
        Request $request,
        IUserVerification $userVerifyRepo,
        IEmailService $EmailService
    ) {
        $this->userRepo = $userRepo;
        $this->userVerifyRepo = $userVerifyRepo;
        $this->EmailService = $EmailService;
        $this->request = $request;
        $this->user = $request->user('api');
    }


    public function generateCode()
    {
        return  Shortid::generate(30, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZAQ");
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
            $this->userVerifyRepo->disableAllActiveUnused($userID);
            $code = $this->generateCode();

            $createUserVerifyInputData = CreateUserVerificationDTO::fromRequest(['user_id' =>  $userID, 'code' => $code]);
            $this->userVerifyRepo->create($createUserVerifyInputData);

            //send Mails
            $detail = ['name' => $dbUser->username, 'company' => 'Land Lotto', 'verify_code' => $code];
            $htmlMail = RegistrationTemplate::getHtml($detail);
            $this->EmailService->sendMail($dbUser->email, 'Welcome :: Activation Required.', $htmlMail);

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

        $validCode = $this->userVerifyRepo->validCode($code);

        if (!$validCode) {
            $response_message = $this->customHttpResponse(400, 'Code does not exist or expired.');
            return $response_message;
        }

        DB::beginTransaction();
        try {

            $this->userVerifyRepo->markUsed($code, $validCode->user_id);

            $createUserVerifyInputData = UpdateUserEmailVerifyDTO::fromRequest();
            $this->userRepo->verifyEmail($validCode->user_id, $createUserVerifyInputData);

            DB::commit();

            $response_message = $this->customHttpResponse(200, 'Email verified successful.Login now to continue.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }
}
