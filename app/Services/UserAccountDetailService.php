<?php

namespace App\Services;

use App\Contracts\Repository\IBanks;
use App\Contracts\Repository\IPackageOptions;
use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\IUser;
use App\Contracts\Repository\IUserAccountDetail;
use App\Contracts\Services\IPackageOptionsService;
use App\Contracts\Services\IUserAccountDetailService;
use App\DTOs\CreatePackageOptionsDTO;
use App\DTOs\CreateUserAccountDetailDTO;
use App\DTOs\UpdatePackageOptionsDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class UserAccountDetailService extends BaseService implements IUserAccountDetailService
{

    private $userRepo;
    private $banksRepo;
    private $userAccDetailRepo;
    private $user;

    public function __construct(Request $request, IUser $userRepo, IBanks $banksRepo, IUserAccountDetail $userAccDetailRepo)
    {
        $this->userRepo = $userRepo;
        $this->banksRepo = $banksRepo;
        $this->userAccDetailRepo = $userAccDetailRepo;
        $this->user = $request->user('api');
    }


    public function find($id)
    {
        $result = $this->userAccDetailRepo->find($id);
        if ($result) {
            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAllByOwner()
    {

        $result = $this->userAccDetailRepo->findAllByOwner($this->user->id);
        $response_message = $this->customHttpResponse(400, 'Success.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->userAccDetailRepo->findAll();
        $response_message = $this->customHttpResponse(200, 'Success.', $result);
        return $response_message;
    }

    public function create(CreateUserAccountDetailDTO $createInputData)
    {

        $dbUser = $this->userRepo->find($createInputData->user_id);
        if (!$dbUser) {
            $response_message = $this->customHttpResponse(400, 'User with the specified ID does not exist.');
            return $response_message;
        }


        $dbBank = $this->banksRepo->findByCode($createInputData->bank_code);
        if (!$dbBank) {
            $response_message = $this->customHttpResponse(400, 'Incorrect bank code.');
            return $response_message;
        }


        DB::beginTransaction();
        try {
            $createInputData->user_id = $dbUser->getOriginal('id');
            $data = $this->userAccDetailRepo->create($createInputData);

            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Account added successful.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error adding account.');
            return $response_message;
        }
    }


    public function softDelete($id)
    {
        $dbUserAccDetail = $this->userAccDetailRepo->find($id);
        if (!$dbUserAccDetail) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        try {
            $this->userAccDetailRepo->delete($id);

            $response_message = $this->customHttpResponse(200, 'Entity deleted successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }
}
