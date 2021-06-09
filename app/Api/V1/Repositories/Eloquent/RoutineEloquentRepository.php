<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Routine;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IRoutine;
use Illuminate\Support\Facades\DB;

class RoutineEloquentRepository extends  EloquentRepository implements IRoutine
{

    public $adsVisit;
    public function __construct(Routine $adsVisit)
    {
        parent::__construct();
        $this->adsVisit =  $adsVisit;
    }

    public function model()
    {
        return Routine::class;
    }

    public function findAllDetailed()
    {
        $res = $this->adsVisit->from('ads_visit as a')
            ->select(
                'a.uuid',
                'u.uuid as visitor_id',
                'u.username as visitor_username',
                'a.created_at',
                'a.updated_at',
                'a.deleted_at',
                'a.visibility'
            )
            ->leftJoin('user as u', 'a.visitor_id', 'u.id')
            ->get();

        return $res;
    }

    public function findOneDetailed($id)
    {
        $res = $this->adsVisit->from('ads_visit as a')
            ->select(
                'a.uuid',
                'u.uuid as visitor_id',
                'u.username as visitor_username',
                'a.created_at',
                'a.updated_at',
                'a.deleted_at',
                'a.visibility'
            )
            ->leftJoin('user as u', 'a.visitor_id', 'u.id')
            ->where("a.uuid", '=', $id)
            ->first();

        return $res;
    }

    public function createAdVisit($detail)
    {
        $newEntity = new Routine();
        $newEntity->uuid = $detail['uuid'];
        $newEntity->ad_id = $detail['ad_id'];
        $newEntity->visitor_id = $detail['visitor_id'];
        $newEntity->save();

        return $newEntity->id;
    }
}
