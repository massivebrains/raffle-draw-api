<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Ticket;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ITicket;

class TicketEloquentRepository extends  EloquentRepository implements ITicket
{

    public function model()
    {
        return Ticket::class;
    }



    public $orders;
    public function __construct(Ticket $orders)
    {
        parent::__construct();
        $this->orders =  $orders;
    }



    public function create($detail)
    {
        $newEntity = new Ticket();
        $newEntity->uuid = $detail['uuid'];
        $newEntity->order_id = $detail['order_id'];
        $newEntity->user_id = $detail['created_by'];
        $newEntity->comment = $detail['comment'];
        $newEntity->save();

        return $newEntity->id;
    }
}
