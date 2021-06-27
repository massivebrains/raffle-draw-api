<?php

namespace App\Services;

use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPackageOptionsService;
use App\DTOs\CreatePackageOptionsDTO;
use App\DTOs\UpdatePackageOptionsDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PackageOptionsService extends BaseService implements IPackageOptionsService
{

    private $userRepo;
    private $packageRepo;
    private $packageOptionsRepo;
    private $request;
    private $payload;

    public function __construct(IUser $userRepo, Request $request, IPackageOptions $packageOptionsRepo, IPackages $packageRepo)
    {
        $this->userRepo = $userRepo;
        $this->packageRepo = $packageRepo;
        $this->packageOptionsRepo = $packageOptionsRepo;
        $this->request = $request;
    }

    public function packageExist($id)
    {
        return $this->packageRepo->find($id);
    }

    public function recordExist($id)
    {
        return $this->packageOptionsRepo->find($id);
    }


    public function create()
    {
        $this->payload = $this->request->input();
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
        $result = $this->packageOptionsRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }


    public function findByPackage($packageID)
    {

        $result = $this->packageRepo->findDetailed($packageID);
        if (!$result) {
            $response_message = $this->customHttpResponse(400, 'Package with the provided id does not exist.');
            return $response_message;
        }

        $result = $this->packageOptionsRepo->findByPackage($packageID);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }


    public function findAll()
    {
        $result = $this->packageOptionsRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }



    public function processCreate()
    {
        $packageID = $this->request->package_id;
        // var_dump($packageID);
        $exist = $this->packageExist($packageID);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Package with the specified ID does not exist.');
            return $response_message;
        }

        DB::beginTransaction();
        try {
            $this->payload['package_id'] = $exist->getOriginal('id');
            $createInputData = CreatePackageOptionsDTO::fromRequest($this->payload);
            $data = $this->packageOptionsRepo->create($createInputData);

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


            $updateInputData = UpdatePackageOptionsDTO::fromRequest($this->payload);
            $this->packageOptionsRepo->update($id, $updateInputData);

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
            $this->packageOptionsRepo->delete($id);

            $response_message = $this->customHttpResponse(200, 'Entity deleted successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }
}
