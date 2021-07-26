<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserRole;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserRole;

class UserRoleEloquentRepository extends  EloquentRepository implements IUserRole
{

    public function model()
    {
        return UserRole::class;
    }
}
