<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\IUpdateUserRequest;
use App\Contracts\FormRequest\IUserLoginRequest;
use App\Contracts\FormRequest\IUserRegisterRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\ILoginService;
use App\Contracts\Services\IRegisterService;
use App\Contracts\Services\IUserService;
use App\Utils\UserMapper;
use Illuminate\Http\Request;


class UserController extends BaseController
{

    private $userRepo;

    public function __construct(IUser $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    public function findAll()
    {
        $result = $this->userRepo->findAll();
        $prunedResult = UserMapper::prune($result);
        $response_message = $this->customHttpResponse(200, 'Success.', $prunedResult);
        return response()->json($response_message);
    }


    public function find($id)
    {
        $result = $this->userRepo->find($id);
        $prunedResult = UserMapper::prune($result);
        $response_message = $this->customHttpResponse(200, 'Success.', $prunedResult);
        return response()->json($response_message);
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


    public function register(Request $request, IUserRegisterRequest $registerRequest, IUserService $registerService)
    {

        $validation = $registerRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details all fields are required.');
            return $response_message;
        }

        return $registerService->create();
    }


    public function update($id, Request $request, IUpdateUserRequest $updateRequest, IUserService $userService)
    {

        $validation = $updateRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.');
            return $response_message;
        }

        return $userService->update($id);
    }
}
