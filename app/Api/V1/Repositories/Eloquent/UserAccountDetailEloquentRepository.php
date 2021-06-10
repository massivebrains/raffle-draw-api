<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserAccountDetail;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserAccountDetail;

class UserAccountDetailEloquentRepository extends  EloquentRepository implements IUserAccountDetail
{
    private $UPAD;

    public function __construct(UserAccountDetail $UPAD)
    {
        parent::__construct();
        $this->UPAD = $UPAD;
    }

    public function model()
    {
        return UserAccountDetail::class;
    }

    public function getIDsByUUID($uuid, $userID)
    {
        $res = $this->UPAD->select('id', 'payment_method_id')
            ->where('uuid', '=', $uuid)
            ->where('user_id', '=', $userID)
            ->first();
        return $res;
    }
}
