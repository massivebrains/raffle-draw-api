<?php

namespace  App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends BaseModel
{
    protected $table = "packages";
    protected $with = ["prize:id,name,value,descr"];

    public function prize()
    {
        return $this->belongsTo(SysPrize::class, 'prize_id');
    }
}
