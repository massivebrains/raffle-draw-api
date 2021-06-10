<?php

namespace App\Services;

use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\ISysPrize;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPackageService;
use App\DTOs\CreatePackageDTO;
use App\DTOs\CreatePrizeDTO;
use App\DTOs\UpdatePackageDTO;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class PackageService extends BaseService implements IPackageService
{

    private $userRepo;
    private $packageRepo;
    private $request;
    private $payload;

    public function __construct(IUser $userRepo, Request $request, IPackages $packageRepo)
    {
        $this->userRepo = $userRepo;
        $this->packageRepo = $packageRepo;
        $this->request = $request;
    }

    public function recordExist($id)
    {
        return $this->packageRepo->find($id);
    }


    public function create()
    {
        $this->payload = $this->request->input();
        $this->name = $this->request->name;

        return $this->processCreate();
    }

    public function update($id)
    {

        $this->user = $this->request->user('api');
        $this->payload = $this->request->all();
        return $this->processUpdate($id);
    }


    public function find($id)
    {
        $result = $this->packageRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->packageRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }



    public function processCreate()
    {

        DB::beginTransaction();
        try {

            $createInputData = CreatePackageDTO::fromRequest($this->payload);
            $data = $this->packageRepo->create($createInputData);

            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Entity added successful.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }


    public function processUpdate($id)
    {

        $exist = $this->recordExist($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }


        DB::beginTransaction();
        try {


            $updateInputData = UpdatePackageDTO::fromRequest($this->payload);
            $this->packageRepo->update($id, $updateInputData);

            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Update successful.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }

    public function softDelete($id)
    {
        $exist = $this->recordExist($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        try {
            $this->prizeRepo->delete($id);

            $response_message = $this->customHttpResponse(200, 'Entity deleted successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }
}
