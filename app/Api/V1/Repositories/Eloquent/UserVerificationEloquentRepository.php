<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserVerification;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserVerification;
use App\DTOs\CreateUserVerificationDTO;
use Illuminate\Support\Facades\DB;

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

    public function disableAllActiveUnused($userID)
    {
        $res = $this->userVerifyModel
            ->where('user_id', $userID)
            ->whereNull('is_verified')
            ->where(DB::raw('TIMESTAMPDIFF(SECOND,CURRENT_TIMESTAMP,expires_at)'), '>', '0') //has not expired.
            ->delete();
        return $res;
    }

    public function validCode($code)
    {
        $res = $this->userVerifyModel
            ->where('code', $code)
            ->whereNull('is_verified')
            ->where(DB::raw('TIMESTAMPDIFF(SECOND,CURRENT_TIMESTAMP,expires_at)'), '>', '0') //has not expired.
            ->first();
        return $res;
    }

    public function markUsed($code, $userID)
    {
        $res = $this->userVerifyModel
            ->where('code', $code)
            ->where('user_id', $userID)
            ->update(['is_verified' => 1]);
        return $res;
    }
}
