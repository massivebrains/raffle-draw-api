<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreatePackageRequest;
use App\Contracts\FormRequest\ICreatePrizeRequest;
use App\Contracts\FormRequest\IUpdatePackageRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPackageService;
use App\Contracts\Services\IPrizeService;
use App\Utils\UserMapper;
use Illuminate\Http\Request;


class PackageController extends BaseController
{

    private $userRepo;
    private $packageService;

    public function __construct(IUser $userRepo, IPackageService $packageService)
    {
        $this->userRepo = $userRepo;
        $this->packageService = $packageService;
    }


    public function create(Request $request, ICreatePackageRequest $packageRequest)
    {

        $validation = $packageRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        return $this->packageService->create();
    }


    public function update($id, Request $request, IUpdatePackageRequest $updateRequest)
    {

        $validation = $updateRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.', $validation->errors());
            return $response_message;
        }

        return $this->packageService->update($id);
    }

    public function find($id)
    {
        return $this->packageService->find($id);
    }


    public function findAll()
    {
        return $this->packageService->findAll();
    }



    public function delete($id)
    {

        return $this->packageService->softDelete($id);
    }
}
