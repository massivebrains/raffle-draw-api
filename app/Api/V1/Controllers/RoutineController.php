<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreateRoutineRequest;
use App\Contracts\Services\IRoutineService;
use App\DTOs\CreateRoutineDTO;
use Illuminate\Http\Request;


class RoutineController extends BaseController
{

    private $request;
    private $routineService;

    public function __construct(Request $request, IRoutineService $routineService)
    {
        $this->request = $request;
        $this->routineService = $routineService;
    }


    public function find($id)
    {
        $userID  = $this->request->user('api')->id;
        return $this->routineService->find($userID, $id);
    }


    public function findAll()
    {
        $userID  = $this->request->user('api')->id;
        return $this->routineService->findAll($userID);
    }


    public function create(Request $request, ICreateRoutineRequest $createRequest)
    {

        $validation = $createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        $userID = $request->user('api')->id;
        $createRoutineInput = CreateRoutineDTO::fromRequest($request, $userID);
        return $this->routineService->create($createRoutineInput);
    }


    public function delete($id)
    {

        return $this->routineService->softDelete($id);
    }

    public function disable($id)
    {

        return $this->routineService->disable($id);
    }
}
