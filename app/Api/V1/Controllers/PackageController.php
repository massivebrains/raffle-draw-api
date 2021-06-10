<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreatePackageRequest;
use App\Contracts\FormRequest\ICreatePrizeRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPrizeService;
use App\Utils\UserMapper;
use Illuminate\Http\Request;


class PackageController extends BaseController
{

    private $userRepo;

    public function __construct(IUser $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    public function create(Request $request, ICreatePackageRequest $packageRequest, IPrizeService $prizeService)
    {

        $validation = $packageRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.');
            return $response_message;
        }

        return $prizeService->create();
    }


    public function delete($id, IPrizeService $prizeService)
    {

        return $prizeService->softDelete($id);
    }
}
