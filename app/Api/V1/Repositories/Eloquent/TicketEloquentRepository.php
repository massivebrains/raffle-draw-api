<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Ticket;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ITicket;
use App\DTOs\CreateTicketDTO;

class TicketEloquentRepository extends  EloquentRepository implements ITicket
{

    public function model()
    {
        return Ticket::class;
    }



    public $ticketModel;
    public function __construct(Ticket $ticketModel)
    {
        parent::__construct();
        $this->ticketModel =  $ticketModel;
    }



    public function create(CreateTicketDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->ticketModel->create($details);

        return $res;
    }
}
