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

    public function findAllDetailed()
    {
        return $this->packageModel->fromQuery(
            "SELECT a.*,sess.sess_expiry as latest_session_expires_at 
             from packages a 
             left join ( 
                SELECT *,MAX(id) as sess_id, MAX(expires_at) as sess_expiry  
                from game_session 
                group by package_id ) as sess 
                on a.id = sess.package_id
            where a.deleted_at is null"
            
        );
    }

    public function findDetailed($id)
    {
        return $this->packageModel->fromQuery(
            "SELECT a.*,sess.sess_expiry as latest_session_expires_at 
             from packages a 
             left join ( 
                SELECT *,MAX(id) as sess_id, MAX(expires_at) as sess_expiry  
                from game_session 
                group by package_id ) as sess 
                on a.id = sess.package_id where a.uuid = '{$id}'
            and a.deleted_at is null"
        )->first();
    }



    public function findByInternalID($id)
    {
        return  $this->packageModel->where('id', $id)->first();
    }
}
