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
}
