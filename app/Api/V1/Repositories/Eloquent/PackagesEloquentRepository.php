<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Packages;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IAdsRepository;
use App\Contracts\Repository\IPackages;
use App\DTOs\CreatePackageDTO;
use App\DTOs\UpdatePackageDTO;
use Illuminate\Support\Facades\DB;

class PackagesEloquentRepository extends  EloquentRepository implements IPackages
{

    public $packageModel;
    public function __construct(Packages $packageModel)
    {
        parent::__construct();
        $this->packageModel =  $packageModel;
    }

    public function model()
    {
        return Packages::class;
    }

    public function create(CreatePackageDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->packageModel->create($details);

        return $res;
    }

    public function update($id, UpdatePackageDTO $details)
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

        $res = $this->packageModel->where('uuid', $id)
            ->update($details);

        return $res;
    }
}
