<?php

namespace  App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;
    protected $table = "user";

    // When querying the user, do not expose the password
    protected $hidden = ['password', 'deleted_at', 'encrypted_password'];

    public function findForPassport($username)
    {
        // Change Custom username for passport

        return $this->where('username', $username)->first();
    }
}
