<?php

namespace App\Services;

use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IRoutine;
use App\Contracts\Repository\IRoutineFrequencyRepo;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IRoutineService;
use App\DTOs\CreatePackageDTO;
use App\DTOs\CreateRoutineDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class RoutineService extends BaseService implements IRoutineService
{

    private $userRepo;
    private $routineRepo;
    private $routineFreqRepo;
    private $packageOptionRepo;
    private $request;
    private $payload;

    public function __construct(
        IUser $userRepo,
        Request $request,
        IRoutine $routineRepo,
        IRoutineFrequencyRepo $routineFreqRepo,
        IPackageOptions $packageOptionRepo
    ) {
        $this->userRepo = $userRepo;
        $this->routineRepo = $routineRepo;
        $this->routineFreqRepo = $routineFreqRepo;
        $this->packageOptionRepo = $packageOptionRepo;
        $this->request = $request;
    }

    public function recordExist($id)
    {
        return $this->packageRepo->find($id);
    }


    public function create(CreateRoutineDTO $createData)
    {
        $dbFreq = $this->routineFreqRepo->find($createData->frequency_id);
        if (!$dbFreq) {
            $response_message = $this->customHttpResponse(400, 'the routine frequency id specified does not exist.');
            return $response_message;
        }


        $dbPackageOption = $this->packageOptionRepo->find($createData->package_option_id);
        if (!$dbPackageOption) {
            $response_message = $this->customHttpResponse(400, 'package with the specified ID does not exist.');
            return $response_message;
        }


        DB::beginTransaction();
        try {

            $createData->frequency_id = $dbFreq->getOriginal('id');
            $createData->package_option_id = $dbPackageOption->getOriginal('id');
            $this->routineRepo->create($createData);

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


    public function find($userID, $routineID)
    {
        $result = $this->routineRepo->findOneByUserID($userID, $routineID);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll($userID)
    {
        $result = $this->routineRepo->findAllByUserID($userID);
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }


    public function softDelete($id)
    {
        $exist = $this->routineRepo->find($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        try {
            $this->routineRepo->delete($id);

            $response_message = $this->customHttpResponse(200, 'Entity deleted successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }


    public function disable($id)
    {
        $exist = $this->routineRepo->find($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        try {
            $this->routineRepo->disable($id);

            $response_message = $this->customHttpResponse(200, 'Entity disabled successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }
}
