<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\SysPrize;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\IRepository;
use App\Contracts\Repository\ISysPrize;
use App\DTOs\CreatePrizeDTO;
use Carbon\Carbon;

class SysPrizeEloquentRepository extends  EloquentRepository implements ISysPrize
{

    public $prizeModel;
    public function __construct(SysPrize $prizeModel)
    {
        parent::__construct();
        $this->prizeModel =  $prizeModel;
    }


    public function model()
    {
        return SysPrize::class;
    }


    public function create(CreatePrizeDTO $detail)
    {
        $newEntity = new SysPrize();
        $newEntity->uuid = $detail->uuid;
        $newEntity->name = $detail->name;
        $newEntity->value = $detail->value;
        $newEntity->descr = $detail->descr;
        $newEntity->save();

        return $newEntity->id;
    }

    /** {@inheritdoc}*/
    public function Update(string $id, array $attributes)
    {
    }
}
