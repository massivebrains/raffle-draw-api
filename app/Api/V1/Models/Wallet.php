<?php

namespace  App\Api\V1\Models;

class Wallet extends BaseModel
{
    protected $table = "wallet";

    protected $with = ["user:id,username,surname,firstname,phone,email"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
