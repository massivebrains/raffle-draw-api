<?php

namespace App\Api\V1\Repositories;

use App\Api\V1\Models\User;
use App\Api\V1\Traits\HttpStatusResponse;
use App\Contracts\IRepository;
use App\Utils\BaseMapper;
use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


abstract class EloquentRepository implements IRepository
{
    use Helpers, HttpStatusResponse;
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function getUser()
    {
        return $this->user();
    }

    /**
     * A method that any class(repository) that extends this class MUST have.
     * @return string The namespace of the Model which would be resolve later.
     */
    abstract public function model();


    private function setModel()
    {
        $this->model = app()->make($this->model()); //resolve to model.
    }

    /** {@inheritdoc}*/
    public function find(string $id)
    {
        $data =  $this->model->where('uuid', '=', $id)->first();
        $prunedData = BaseMapper::prune($data);
        return $prunedData;
    }

    /** {@inheritdoc}*/
    public function isDeleted(string $id)
    {
        $data =  $this->model->where('uuid', $id)
            // ->whereNotNull('deleted_at')
            ->first();
        $prunedData = BaseMapper::prune($data);
        return $prunedData;
    }

    /** {@inheritdoc}*/
    public function findAll(): Collection
    {
        $data =  $this->model->all();
        $prunedData = BaseMapper::prune($data);
        return $prunedData;
    }

    /** {@inheritdoc}*/
    public function delete($entityID)
    {
        return $this->model->where('uuid', $entityID)
            ->delete();
    }

    /** {@inheritdoc}*/
    public function forceDelete($entityID)
    {
        return $this->model->where('uuid', $entityID)
            ->forceDelete();
    }
}
