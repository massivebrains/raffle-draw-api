<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\IUpdateUserRequest;
use App\Contracts\FormRequest\IUserLoginRequest;
use App\Contracts\FormRequest\IUserRegisterRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\ILoginService;
use App\Contracts\Services\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function findAllAdmin()
    {
        return $this->userService->findAllAdmin();
    }

    public function findAllPlayers()
    {
        return $this->userService->findAllPlayers();
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
            $response_message = $this->customHttpResponse(400, 'Incorrect login details.', $validation->errors());
            return $response_message;
        }

        return $loginService->init();
    }


    public function register(Request $request, IUserRegisterRequest $registerRequest)
    {

        $request['role'] = 1;
        $validation = $registerRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details all fields are required.', $validation->errors());
            return $response_message;
        }

        return $this->userService->create();
    }



    public function registerAdmin(Request $request, IUserRegisterRequest $registerRequest)
    {
        $request['role'] = 2;

        $validation = $registerRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details all fields are required.', $validation->errors());
            return $response_message;
        }

        return $this->userService->create();
    }




    public function update($id, Request $request, IUpdateUserRequest $updateRequest)
    {

        $validation = $updateRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.', $validation->errors());
            return $response_message;
        }

        return $this->userService->update($id);
    }

    public function delete($userID)
    {

        return $this->userService->softDelete($userID);
    }
}
