<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\PackageOptions;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPackageOptions;
use App\DTOs\CreatePackageOptionsDTO;
use App\DTOs\UpdatePackageOptionsDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function updateSells($packageOptionID)
    {
        return $this->packageOptionsModel->where('uuid', $packageOptionID)
            ->update([
                'purchase_count' => DB::raw("purchase_count + 1"),
                'last_purchased_at' => Carbon::now(),
            ]);
    }


    public function findByPackage(string $package)
    {
        $res = $this->packageOptionsModel->from('package_options as a')
            ->select('a.*')
            ->leftJoin('packages as p', 'a.package_id', 'p.id')
            ->withTrashed()
            ->where('p.uuid', $package)
            ->get();
        return $res;
    }
}
