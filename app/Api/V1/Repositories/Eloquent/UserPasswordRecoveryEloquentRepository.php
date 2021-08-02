<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserPasswordRecovery;
use App\Api\V1\Models\UserVerification;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserPasswordRecovery;
use App\DTOs\CreateUserVerificationDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserPasswordRecoveryEloquentRepository extends  EloquentRepository implements IUserPasswordRecovery
{


    public $userPasswordRecoveryModel;
    public function __construct(UserPasswordRecovery $userPasswordRecoveryModel)
    {
        parent::__construct();
        $this->userPasswordRecoveryModel =  $userPasswordRecoveryModel;
    }


    public function model()
    {
        return UserVerification::class;
    }


    public function create(CreateUserVerificationDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->userPasswordRecoveryModel->create($details);

        return $res;
    }

    public function disableAllActiveUnused($userID)
    {
        $res = $this->userPasswordRecoveryModel
            ->where('user_id', $userID)
            ->whereNull('used_at')
            ->where(DB::raw('TIMESTAMPDIFF(SECOND,CURRENT_TIMESTAMP,expires_at)'), '>', '0') //has not expired.
            ->delete();
        return $res;
    }

    public function validCode($code)
    {
        $res = $this->userPasswordRecoveryModel
            ->from('user_password_recovery as a')
            ->select('a.*', 'u.uuid as user_uuid')
            ->leftJoin('user as u', 'a.user_id', 'u.id')
            ->withTrashed()
            ->where('a.code', $code)
            ->whereNull('a.used_at')
            ->where(DB::raw('TIMESTAMPDIFF(SECOND,CURRENT_TIMESTAMP,expires_at)'), '>', '0') //has not expired.
            ->first();
        return $res;
    }

    public function markUsed($code, $userID)
    {
        $res = $this->userPasswordRecoveryModel
            ->where('code', $code)
            ->where('user_id', $userID)
            ->update(['used_at' => Carbon::now()]);
        return $res;
    }
}
