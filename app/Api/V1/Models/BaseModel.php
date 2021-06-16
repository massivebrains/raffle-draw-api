<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $hidden = [
        'id',
        'deleted_at',
        'extra',
        'slug',
        'updated_at',
        'visibility',
        'prize_id',
        'package_id',
        'user_id',
        'session_id',
        'payment_id',
        'package_option_id',
        'routine_id',
        'initiated_by',
        'created_by',
        'drawn_by',
        'ticket_id',
        'owner_id',
    ];
}
