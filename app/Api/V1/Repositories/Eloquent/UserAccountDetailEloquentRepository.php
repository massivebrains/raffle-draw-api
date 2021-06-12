<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserAccountDetail;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserAccountDetail;
use App\DTOs\CreateUserAccountDetailDTO;

class UserAccountDetailEloquentRepository extends  EloquentRepository implements IUserAccountDetail
{
    private $userAccDetailModel;

    public function __construct(UserAccountDetail $userAccDetailModel)
    {
        parent::__construct();
        $this->userAccDetailModel = $userAccDetailModel;
    }

    public function model()
    {
        return UserAccountDetail::class;
    }


    public function create(CreateUserAccountDetailDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->userAccDetailModel->create($details);

        return $res;
    }
}
