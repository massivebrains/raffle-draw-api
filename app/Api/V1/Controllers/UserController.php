<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\IUpdateUserRequest;
use App\Contracts\FormRequest\IUserLoginRequest;
use App\Contracts\FormRequest\IUserRegisterRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IUserActivityLog;
use App\Contracts\Services\ILoginService;
use App\Contracts\Services\IRegisterService;
use App\Contracts\Services\IUserService;
use App\Utils\UserMapper;
use Illuminate\Http\Request;


class UserController extends BaseController
{

    private $userRepo;
    private $userService;

    public function __construct(IUser $userRepo, IUserService $userService)
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;
    }


    public function find($id)
    {
        return $this->userService->find($id);
    }


    public function findAll()
    {
        return $this->userService->findAll();
    }


    public function logout(Request $request)
    {
        $token = $request->user('api')->token();
        $token->revoke();

        //send nicer data to the user
        $response_message = $this->customHttpResponse(200, 'Logged out successful.');
        return response()->json($response_message);
    }


    public function login(Request $request, IUserLoginRequest $loginRequest, ILoginService $loginService)
    {

        $validation = $loginRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect login details.');
            return $response_message;
        }

        return $loginService->init();
    }


    public function register(Request $request, IUserRegisterRequest $registerRequest)
    {

        $validation = $registerRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details all fields are required.');
            return $response_message;
        }

        return $this->userService->create();
    }


    public function update($id, Request $request, IUpdateUserRequest $updateRequest)
    {

        $validation = $updateRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.');
            return $response_message;
        }

        return $this->userService->update($id);
    }
}