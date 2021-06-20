<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreatePrizeRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPrizeService;
use App\Utils\UserMapper;
use Illuminate\Http\Request;


class PrizeController extends BaseController
{

    private $userRepo;
    private $prizeService;

    public function __construct(IUser $userRepo, IPrizeService $prizeService)
    {
        $this->userRepo = $userRepo;
        $this->prizeService = $prizeService;
    }


    public function find($id)
    {
        return $this->prizeService->find($id);
    }


    public function findAll()
    {
        return $this->prizeService->findAll();
    }


    public function create(Request $request, ICreatePrizeRequest $prizeRequest)
    {

        $validation = $prizeRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        return $this->prizeService->create();
    }


    public function delete($id)
    {

        return $this->prizeService->softDelete($id);
    }
}
