<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserVerification;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserVerification;
use App\DTOs\CreateUserVerificationDTO;

class UserVerificationEloquentRepository extends  EloquentRepository implements IUserVerification
{


    public $userVerifyModel;
    public function __construct(UserVerification $userVerifyModel)
    {
        parent::__construct();
        $this->userVerifyModel =  $userVerifyModel;
    }


    public function model()
    {
        return UserVerification::class;
    }


    public function create(CreateUserVerificationDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->userVerifyModel->create($details);

        return $res;
    }
}
