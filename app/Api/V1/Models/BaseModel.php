<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $hidden = ['id', 'deleted_at', 'extra', 'slug', 'updated_at', 'visibility', 'prize_id', 'package_id'];
}
