<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreatePackageOptionsRequest;
use App\Contracts\FormRequest\IUpdatePackageOptionsRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPackageOptionsService;
use Illuminate\Http\Request;


class PackageOptionsController extends BaseController
{

    private $userRepo;
    private $packageOptionService;

    public function __construct(IUser $userRepo, IPackageOptionsService $packageOptionService)
    {
        $this->userRepo = $userRepo;
        $this->packageOptionService = $packageOptionService;
    }


    public function create(Request $request, ICreatePackageOptionsRequest $createRequest)
    {

        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        return $this->packageOptionService->create();
    }


    public function update($id, Request $request, IUpdatePackageOptionsRequest $updateRequest)
    {

        $validation = $updateRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.', $validation->errors());
            return $response_message;
        }

        return $this->packageOptionService->update($id);
    }

    public function find($id)
    {
        return $this->packageOptionService->find($id);
    }

    public function findByPackage($id)
    {
        return $this->packageOptionService->findByPackage($id);
    }


    public function findAll()
    {
        return $this->packageOptionService->findAll();
    }



    public function delete($id)
    {

        return $this->packageOptionService->softDelete($id);
    }
}
