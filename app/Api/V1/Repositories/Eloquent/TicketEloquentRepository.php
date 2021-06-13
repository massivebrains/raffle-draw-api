<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Ticket;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ITicket;
use App\DTOs\CreateTicketDTO;
use App\DTOs\UpdateDrawDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function shuffleTicket(string $sessionID)
    {

        //TODO: DONT FORGET TO SET SESSION_ID here

        DB::statement("SET @index := 0");
        DB::statement("UPDATE ticket set draw_index = (@index:=@index+1)  where drawn_at is null order by rand() ");
    }

    public function findByDrawIndex(array $drawIndexes)
    {

        $res =  $this->ticketModel
            ->whereIn('draw_index', $drawIndexes)
            ->whereNull('drawn_at')      //don't draw already drawn(selected) ticket.
            ->orderBy('draw_index')
            ->get();
        return $res;
    }


    public function updateTicketDraw(array $ticketIDs, UpdateDrawDTO $updateDrawData)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($updateDrawData), true);

        return $this->ticketModel->whereIn('uuid', $ticketIDs)
            ->update($details);
    }
}
