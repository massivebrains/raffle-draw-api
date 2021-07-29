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


    public function findByUserID(int $userID)
    {
        $res = $this->ticketModel->from('ticket as a')
            ->select('a.*', 'p.name as package_name', 'descr as package_desc')
            ->leftJoin('packages as p', 'a.package_id', 'p.id')
            ->withTrashed()
            ->where('a.user_id', $userID)
            ->get();
        return $res;
    }

    public function findBySessionID(string $sessionID)
    {
        $res = $this->ticketModel->from('ticket as a')
            ->select('a.*', 'p.name as package_name', 'descr as package_desc')
            ->leftJoin('packages as p', 'a.package_id', 'p.id')
            ->withTrashed()
            ->where('a.session_id', $sessionID)
            ->whereNull('a.deleted_at')
            ->get();
        return $res;
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

    public function getStat()
    {
        $res = $this->ticketModel
            ->fromQuery(
                "SELECT 
                count(tck.id) as total_ticket_count, 
                sum(case when Date(tck.created_at) = CURRENT_DATE then 1 else 0 end) as today_ticket_count,
                
                sum(case when package_id = 1 then 1 else 0 end) as daily_ticket_count,
                sum(case when package_id = 1 and Date(tck.created_at) = CURRENT_DATE then 1 else 0 end) as today_daily_ticket_count,
                
                sum(case when package_id = 2 then 1 else 0 end) as weekly_ticket_count,
                sum(case when package_id = 2 and Date(tck.created_at) = CURRENT_DATE then 1 else 0 end) as today_weekly_ticket_count,
                
                sum(case when package_id = 3 then 1 else 0 end) as monthly_ticket_count,
                sum(case when package_id = 3 and Date(tck.created_at) = CURRENT_DATE then 1 else 0 end) as today_monthly_ticket_count,
                
                sum(case when package_id = 4 then 1 else 0 end) as bi_monthly_ticket_count,
                sum(case when package_id = 4 and Date(tck.created_at) = CURRENT_DATE then 1 else 0 end) as today_bi_monthly_ticket_count,
                
                sum(case when package_id = 5 then 1 else 0 end) as quaterly_ticket_count,
                sum(case when package_id = 5 and Date(tck.created_at) = CURRENT_DATE then 1 else 0 end) as today_quaterly_ticket_count
                
              
                from ticket tck 
                where tck.deleted_at is null
               
                 "
            );
        return $res;
    }
}
