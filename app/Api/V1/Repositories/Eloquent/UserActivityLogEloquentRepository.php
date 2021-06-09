<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\UserActivityLog;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IUserActivityLog;

class UserActivityLogEloquentRepository extends  EloquentRepository implements IUserActivityLog
{

    public function model()
    {
        return UserActivityLog::class;
    }
}
