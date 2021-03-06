<?php

namespace App\Services;

use App\Contracts\Repository\ISysPrize;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPrizeService;
use App\DTOs\CreatePrizeDTO;
use App\Utils\BaseMapper;
use App\Utils\UserMapper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class PrizeService extends BaseService implements IPrizeService
{

    private $userRepo;
    private $prizeRepo;
    private $request;
    private $payload;

    public function __construct(IUser $userRepo, Request $request, ISysPrize $prizeRepo)
    {
        $this->userRepo = $userRepo;
        $this->prizeRepo = $prizeRepo;
        $this->request = $request;
    }

    public function recordExist($id)
    {
        return $this->prizeRepo->find($id);
    }


    public function create()
    {
        $this->payload = $this->request->input();
        $this->name = $this->request->name;
        $this->value = $this->request->value;

        return $this->process();
    }


    public function find($id)
    {
        $result = $this->prizeRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->prizeRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }


    public function process()
    {
        try {
            /**
             * Hit the repository now and create the necessary default setup for this user. E.g User profile, Wallet, etc
             * All wrapped within a Transaction for integrity purposes. Commit when successful and Rollback otherwise(any slight error).
             */

            DB::beginTransaction();
            try {

                $createUserInputData = CreatePrizeDTO::fromRequest($this->payload);
                $data = $this->prizeRepo->create($createUserInputData);

                DB::commit();


                $response_message = $this->customHttpResponse(200, 'Entity added successful.');
                return $response_message;
            } catch (\Throwable $th) {

                DB::rollBack();
                Log::info("One of the DB statements failed. Error: " . $th);

                $response_message = $this->customHttpResponse(500, 'Transaction Error.');
                return $response_message;
            }
        } catch (\Throwable $th) {

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
