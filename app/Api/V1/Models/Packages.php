<?php

namespace  App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends BaseModel
{
    protected $table = "packages";
    protected $with = ["prize:id,name,value,descr", "pricing:id,uuid,package_id,price,ticket_qty"];

    public function prize()
    {
        return $this->belongsTo(SysPrize::class, 'prize_id');
    }

    public function pricing()
    {
        return $this->hasMany(PackageOptions::class, 'package_id');
    }
}
