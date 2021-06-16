<?php

namespace  App\Api\V1\Models;

class DrawWinners extends BaseModel
{
    protected $table = "draw_winners";

    protected $with = [
        "user:id,username,surname,firstname,phone,email",
        "ticket:id,ticket_short_code",
        "session:id,uuid",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function session()
    {
        return $this->belongsTo(GameSession::class, 'session_id');
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
}
