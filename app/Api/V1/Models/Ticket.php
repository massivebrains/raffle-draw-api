<?php

namespace  App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends BaseModel
{
    protected $table = "ticket";

    protected $with = ["user:id,username,surname,firstname,phone,email"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
