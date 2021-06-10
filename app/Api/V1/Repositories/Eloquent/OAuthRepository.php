<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\oAuthClient;
use App\Api\V1\Models\User;
use App\Contracts\Repository\IUser;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IOAuth;
use App\DTOs\CreateUserDTO;
use App\DTOs\OAuthDTO;
use App\Utils\Mapper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OAuthRepository extends  EloquentRepository implements IOAuth
{
    public $oauth;
    public function __construct(oAuthClient $oauth)
    {
        parent::__construct();
        $this->oauth =  $oauth;
    }

    public function model()
    {
        return oAuthClient::class;
    }



    public function create(OAuthDTO $details)
    {

        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);

        //create entity
        $entity = $this->oauth->create($details);

        return $entity;
    }


    public function updateSecret($userId, $newSecret)
    {

        $res = $this->oauth->where('user_id', $userId)
            // ->withTrashed()
            ->update(['secret' => $newSecret]);

        return $res;
    }
}
