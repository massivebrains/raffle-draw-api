<?php

namespace  App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends BaseModel
{
    protected $table = "ticket";

    protected $with = ["user:id,username,surname,firstname,phone,email", "packageOption:id,price"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function packageOption()
    {
        return $this->belongsTo(PackageOptions::class, 'package_option_id');
    }

    public function package()
    {
        return $this->belongsTo(packages::class, 'package_id');
    }
}
