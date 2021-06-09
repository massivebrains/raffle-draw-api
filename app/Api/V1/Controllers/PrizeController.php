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

    public function __construct(IUser $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    // public function findAll()
    // {
    //     $result = $this->userRepo->findAll();
    //     $prunedResult = UserMapper::prune($result);
    //     $response_message = $this->customHttpResponse(200, 'Success.', $prunedResult);
    //     return response()->json($response_message);
    // }


    // public function find($id)
    // {
    //     $result = $this->userRepo->find($id);
    //     $prunedResult = UserMapper::prune($result);
    //     $response_message = $this->customHttpResponse(200, 'Success.', $prunedResult);
    //     return response()->json($response_message);
    // }


    public function create(Request $request, ICreatePrizeRequest $prizeRequest, IPrizeService $prizeService)
    {

        $validation = $prizeRequest->validate($request);

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
