<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\PackageOptions;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPackageOptions;
use App\DTOs\CreatePackageOptionsDTO;
use App\DTOs\UpdatePackageOptionsDTO;

class PackageOptionsEloquentRepository extends  EloquentRepository implements IPackageOptions
{

    private $packageOptionsModel;

    public function __construct(PackageOptions $packageOptionsModel)
    {
        parent::__construct();
        $this->packageOptionsModel = $packageOptionsModel;
    }

    public function model()
    {
        return PackageOptions::class;
    }

    public function create(CreatePackageOptionsDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->packageOptionsModel->create($details);

        return $res;
    }

    public function update($id, UpdatePackageOptionsDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);

        //go through all and unset all NULL values
        unset($details['uuid']);
        foreach ($details as $key => $value) {
            if (is_null($value)) {
                unset($details[$key]);
            }
        }

        $res = $this->packageOptionsModel->where('uuid', $id)
            ->update($details);

        return $res;
    }
}