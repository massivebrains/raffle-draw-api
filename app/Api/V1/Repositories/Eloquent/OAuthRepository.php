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
        //create entity
        $entity = $this->oauth;
        $entity->id = $details->id;
        $entity->user_id =  $details->user_id;
        $entity->name =  $details->name;
        $entity->secret =  $details->secret;
        $entity->password_client = $details->password_client;
        $entity->personal_access_client = $details->personal_access_client;
        $entity->redirect = $details->redirect;
        $entity->revoked = $details->revoked;
        $entity->save();
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
