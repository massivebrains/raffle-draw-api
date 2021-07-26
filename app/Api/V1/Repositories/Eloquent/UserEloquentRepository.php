<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\oAuthClient;
use App\Api\V1\Models\User;
use App\Contracts\Repository\IUser;
use App\Api\V1\Repositories\EloquentRepository;
use App\DTOs\CreateUserDTO;
use App\DTOs\UpdateUserDTO;
use App\DTOs\UpdateUserEmailVerifyDTO;
use App\Utils\Mapper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserEloquentRepository extends  EloquentRepository implements IUser
{
    public $user;
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user =  $user;
    }

    public function model()
    {
        return User::class;
    }

    public function verifyEmail(int $userID, UpdateUserEmailVerifyDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);

        $res = $this->user
            ->where('id', $userID)
            ->update($details);
        return $res;
    }

    public function getByEmail(string $email)
    {
        $res = $this->user
            ->where('email', $email)
            ->first();
        return $res;
    }


    public function getAllAdmin()
    {
        $res = $this->user
            ->where('role', "<>", "1")
            ->get();
        return $res;
    }

    public function getAllPlayers()
    {
        $res = $this->user
            ->where('role', "1")
            ->get();
        return $res;
    }


    public function showByUsername(string $username)
    {
        $res = $this->user->from('user as a')
            ->select(
                'a.id',
                'a.uuid',
                'a.username',
                'a.password',
                'a.surname',
                'a.firstname',
                'a.phone',
                'a.email',
                'a.verified_email_at',
                'a.verified_email_expire_at',
                'a.avatar',
                'c.stub as role'
            )
            ->leftJoin('user_role as c', 'a.role', 'c.id')
            ->where("a.username", '=', $username)
            ->withTrashed()
            ->first();

        return $res;
    }

    public function create(CreateUserDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);


        //create user profile
        $auth = $this->user->create($details);

        return $auth;
    }

    public function update($id, UpdateUserDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);

        //go through all and unset all NULL values
        unset($details['uuid']);
        foreach ($details as $key => $value) {
            if (is_null($value)) {
                unset($details[$key]);
            }
        }

        //create user profile
        $res = $this->user->where('uuid', $id)
            ->update($details);

        return $res;
    }


    public function nameByEmailExist($details)
    {

        $firstname = $details['firstname'];
        $lastname = $details['surname'];
        $email = $details['email'];

        $res =  DB::select(DB::raw(
            "SELECT a.* FROM user a
            WHERE (a.firstname = '{$firstname}' and a.surname = '{$lastname}' OR
                  a.firstname ='{$lastname}' and a.surname = '{$firstname}') AND
                  a.email = '{$email}'   
         "
        ));

        return is_null($res) || empty($res) ? $res : $res[0];
    }

    public function nameByUsernameExist($details)
    {
        $username = $details['username'];

        $res =  DB::select(DB::raw(
            "SELECT a.* FROM user a
            WHERE a.username = '{$username}'   
         "
        ));

        return is_null($res) || empty($res) ? $res : $res[0];
    }

    public function emailExist($details)
    {
        $email = $details['email'];

        $res =  DB::select(DB::raw(
            "SELECT a.* FROM user a
            WHERE a.email = '{$email}'   
         "
        ));

        return is_null($res) || empty($res) ? $res : $res[0];
    }
}
