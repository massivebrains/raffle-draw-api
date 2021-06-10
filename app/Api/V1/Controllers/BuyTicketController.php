<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\IBuyTicketRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IBuyTicketService;
use Illuminate\Http\Request;


class BuyTicketController extends BaseController
{

    private $userRepo;
    private $buyTicketService;

    public function __construct(IUser $userRepo, IBuyTicketService $buyTicketService)
    {
        $this->userRepo = $userRepo;
        $this->buyTicketService = $buyTicketService;
    }


    public function create(Request $request, IBuyTicketRequest $createRequest)
    {

        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        return $this->buyTicketService->create();
    }


    // public function update($id, Request $request, IUpdatePackageOptionsRequest $updateRequest)
    // {

    //     $validation = $updateRequest->validate($request);

    //     if ($validation->fails()) {
    //         $response_message = $this->customHttpResponse(400, 'Incorrect details check required fields.');
    //         return $response_message;
    //     }

    //     return $this->packageOptionService->update($id);
    // }

    // public function find($id)
    // {
    //     return $this->packageOptionService->find($id);
    // }


    // public function findAll()
    // {
    //     return $this->packageOptionService->findAll();
    // }



    // public function delete($id)
    // {

    //     return $this->packageOptionService->softDelete($id);
    // }
}
