<?php

namespace App\Services;

use App\Contracts\Repository\IUser;
use App\Contracts\Services\ILoginService;
use App\Helper\UserScope;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;


class LoginService extends BaseService implements ILoginService
{

    private $userRepo;
    private $username;
    private $password;
    private $user;
    private $request;

    public function __construct(IUser $userRepo, Request $request)
    {
        $this->userRepo = $userRepo;
        $this->request = $request;
    }

    public function init()
    {

        $this->username = $this->request->get('username');
        $this->password = $this->request->get('password');
        $this->user = $this->userRepo->showByUsername($this->username);
        return $this->processLogin();
    }


    public function userExist()
    {
        return $this->user ? true : false;
    }

    public function checkPassword($passwordPlain)
    {
        return Hash::check($passwordPlain, $this->user->password);
    }

    public function getUserScope()
    {
        return  UserScope::get($this->user->role);
    }

    public function getToken()
    {
        $scope = $this->getUserScope();
        return $this->getTokenByCurl($this->user->id, $this->username, $this->password, $scope);
    }

    public function processLogin()
    {

        if (!$this->userExist()) {
            //does not exist
            $response_message = $this->customHttpResponse(401, 'User does not Exist or details incorrect.');
            return $response_message;
        }

        if (!$this->checkPassword($this->password)) {
            //password does not exist
            $response_message = $this->customHttpResponse(401, 'User does not Exist or details incorrect.');
            return $response_message;
        }


        if (is_null($this->user->verified_email_at)) {
            $response_message = $this->customHttpResponse(401, 'Verification is required. Follow the link sent to your email to activate.');
            return $response_message;
        }

        if (!is_null($this->user->verified_email_expire_at)) {



            $now = Carbon::now();
            $expires = Carbon::parse($this->user->verified_email_expire_at);
            $timeRemaining = $now->diffInSeconds($expires, false);

            if ($timeRemaining < 1) {
                $response_message = $this->customHttpResponse(401, 'Re-verification is required.');
                return $response_message;
            }
        }


        try {


            $TokenResponse = $this->getToken();
            $result = [
                'token' => $TokenResponse->access_token,
                'current_user' => $this->pruneSensitive($this->user)
            ];
            $response_message = $this->customHttpResponse(200, 'Login successful. Token generated.', $result);
            return  $response_message;
        } catch (Exception $th) {

            Log::info("generating token failed");
            Log::info($th->getMessage());

            $response_message = $this->customHttpResponse(401, 'Client authentication failed.');
            return  $response_message;
        }
    }

    public function getTokenByCurl($userID, $username, $password, $scope)
    {

        $BaseEndPoint =  url('/'); // Base Url , basically.
        $CurrentEndpoint = "/oauth/token";
        $FullEndPoint =  $BaseEndPoint . $CurrentEndpoint;

        try {
            $TokenResponse  = Curl::to($FullEndPoint)
                ->withData([
                    "client_id" =>   $userID,
                    "client_secret" => base64_encode(hash_hmac('sha256', $password, 'secret', true)),
                    "grant_type" => 'password',
                    "scope" => $scope,
                    "username" =>   $username,
                    "password" =>    $password
                ])
                ->asJson()
                ->post();

            if ($TokenResponse and property_exists($TokenResponse, "access_token")) {
                return $TokenResponse;
            } else {
                throw new Exception("Client does not exist", 1);
            }
        } catch (\Throwable $th) {
            Log::info("TokenResponse catch " . $th->getMessage());
            throw new Exception("Client does not exist", 1);
        }
    }
}
