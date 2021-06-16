<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreatePackageOptionsRequest;
use App\Contracts\FormRequest\ICreateUserAccountDetailRequest;
use App\Contracts\FormRequest\IUpdatePackageOptionsRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPackageOptionsService;
use App\Contracts\Services\IUserAccountDetailService;
use App\DTOs\CreateUserAccountDetailDTO;
use Illuminate\Http\Request;


class UserAccountDetailController extends BaseController
{

    private $userRepo;
    private $userAccDetailsService;

    public function __construct(IUser $userRepo, IUserAccountDetailService $userAccDetailsService)
    {
        $this->userRepo = $userRepo;
        $this->userAccDetailsService = $userAccDetailsService;
    }


    public function create(Request $request, ICreateUserAccountDetailRequest $createRequest)
    {

        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        $createInput = CreateUserAccountDetailDTO::fromRequest($request);
        return $this->userAccDetailsService->create($createInput);
    }


    public function find($id)
    {
        return $this->userAccDetailsService->find($id);
    }


    public function findAll()
    {
        return $this->userAccDetailsService->findAll();
    }


    public function findAllByOwner()
    {
        return $this->userAccDetailsService->findAllByOwner();
    }



    public function delete($id)
    {

        return $this->userAccDetailsService->softDelete($id);
    }
}
