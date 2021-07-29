<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\Payment;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\IPayment;
use App\DTOs\CreatePaymentDTO;

class PaymentEloquentRepository extends  EloquentRepository implements IPayment
{

    public $paymentModel;
    public function __construct(Payment $paymentModel)
    {
        parent::__construct();
        $this->paymentModel =  $paymentModel;
    }


    public function model()
    {
        return Payment::class;
    }

    public function create(CreatePaymentDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->paymentModel->create($details);

        return $res;
    }

    public function getStat()
    {
        $res = $this->paymentModel
            ->fromQuery(
                "SELECT 
                sum(pm.amount) as total_sales, 
                sum(case when Date(pm.created_at) = CURRENT_DATE then pm.amount else 0 end) as today_sales,
                
                sum(case when gs.package_id = 1 then pm.amount else 0 end) as daily_sales,
                sum(case when gs.package_id = 1 and Date(pm.created_at) = CURRENT_DATE then pm.amount else 0 end) as today_daily_sales,
                
                sum(case when gs.package_id = 2 then pm.amount else 0 end) as weekly_sales,
                sum(case when gs.package_id = 2 and Date(pm.created_at) = CURRENT_DATE then pm.amount else 0 end) as today_weekly_sales,
                
                sum(case when gs.package_id = 3 then pm.amount else 0 end) as monthly_sales,
                sum(case when gs.package_id = 3 and Date(pm.created_at) = CURRENT_DATE then pm.amount else 0 end) as today_monthly_sales,
                
                sum(case when gs.package_id = 4 then pm.amount else 0 end) as bi_monthly_sales,
                sum(case when gs.package_id = 4 and Date(pm.created_at) = CURRENT_DATE then pm.amount else 0 end) as today_bi_monthly_sales,
                
                sum(case when gs.package_id = 5 then pm.amount else 0 end) as quaterly_sales,
                sum(case when gs.package_id = 5 and Date(pm.created_at) = CURRENT_DATE then pm.amount else 0 end) as today_quaterly_sales
                
              
                from payment pm 
                left join game_session gs on pm.session_id = gs.id
                where pm.deleted_at is null
               
                 "
            );
        return $res;
    }
}
