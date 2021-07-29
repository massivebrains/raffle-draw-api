<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\DrawWinners;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IDrawWinner;
use App\DTOs\DrawWinnersDTO;

class DrawWinnersEloquentRepository extends  EloquentRepository implements IDrawWinner
{

    private $drawModel;

    public function __construct(DrawWinners $drawModel)
    {
        parent::__construct();
        $this->drawModel = $drawModel;
    }


    public function model()
    {
        return DrawWinners::class;
    }


    public function create($details)
    {

        $res = $this->drawModel->insert($details);

        return $res;
    }


    public function findBySession(int $sessionID)
    {
        $res = $this->drawModel->from('draw_winners as a')
            ->select('a.*', 'p.uuid', 'p.name', 'p.slug', 'p.icon', 'sess.uuid as sessionid')
            ->leftJoin('packages as p', 'a.package_id', 'p.id')
            ->leftJoin('game_session as sess', 'a.session_id', 'sess.id')
            ->withTrashed()
            ->where('a.session_id', $sessionID)
            ->whereNull('a.deleted_at')
            ->get();
        return $res;
    }

    public function findAllSelf(int $userID)
    {
        $res = $this->drawModel->from('draw_winners as a')
            ->select('a.*', 'p.uuid', 'p.name', 'p.slug', 'p.icon', 'sess.uuid as sessionid')
            ->leftJoin('packages as p', 'a.package_id', 'p.id')
            ->leftJoin('game_session as sess', 'a.session_id', 'sess.id')
            ->withTrashed()
            ->where('a.owner_id', $userID)
            ->whereNull('a.deleted_at')
            ->get();
        return $res;
    }

    public function findAllDetailed()
    {
        $res = $this->drawModel->from('draw_winners as a')
            ->select('a.*', 'p.uuid', 'p.name', 'p.slug', 'p.icon', 'sess.uuid as sessionid')
            ->leftJoin('packages as p', 'a.package_id', 'p.id')
            ->leftJoin('game_session as sess', 'a.session_id', 'sess.id')
            ->withTrashed()
            ->whereNull('a.deleted_at')
            ->get();
        return $res;
    }

    public function getStat()
    {
        $res = $this->drawModel
            ->fromQuery(
                "SELECT 
                count(dw.id) as total_winners_count, 
                sum(case when Date(dw.created_at) = CURRENT_DATE then 1 else 0 end) as today_winner_count,
                
                sum(case when package_id = 1 then 1 else 0 end) as daily_winner_count,
                sum(case when package_id = 1 and Date(dw.created_at) = CURRENT_DATE then 1 else 0 end) as today_daily_winner_count,
                
                sum(case when package_id = 2 then 1 else 0 end) as weekly_winner_count,
                sum(case when package_id = 2 and Date(dw.created_at) = CURRENT_DATE then 1 else 0 end) as today_weekly_winner_count,
                
                sum(case when package_id = 3 then 1 else 0 end) as monthly_winner_count,
                sum(case when package_id = 3 and Date(dw.created_at) = CURRENT_DATE then 1 else 0 end) as today_monthly_winner_count,
                
                sum(case when package_id = 4 then 1 else 0 end) as bi_monthly_winner_count,
                sum(case when package_id = 4 and Date(dw.created_at) = CURRENT_DATE then 1 else 0 end) as today_bi_monthly_winner_count,
                
                sum(case when package_id = 5 then 1 else 0 end) as quaterly_winner_count,
                sum(case when package_id = 5 and Date(dw.created_at) = CURRENT_DATE then 1 else 0 end) as today_quaterly_winner_count
                
              
                from draw_winners dw 
                where dw.deleted_at is null
               
                 "
            );
        return $res;
    }
}
