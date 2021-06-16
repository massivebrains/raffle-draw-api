<?php

namespace App\Http\Middleware;

use App\Contracts\FormRequest\IFundWalletRequest;
use App\Contracts\Repository\ISysSettingsRepository;
use Closure;
use App\Http\Middleware\BaseMiddleware;

class MinMaxDepositMiddleware extends BaseMiddleware
{
    private $sysSettingsRepo;
    private $createRequest;

    public function __construct(ISysSettingsRepository $sysSettingsRepo, IFundWalletRequest $createRequest)
    {
        $this->sysSettingsRepo = $sysSettingsRepo;
        $this->createRequest = $createRequest;
    }

    public function handle($request, Closure $next)
    {

        $validation = $this->createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        $systemSettings = $this->sysSettingsRepo->getSystemSettings();
        if (!$systemSettings) {
            $response_message = $this->customHttpResponse(400, 'No system settings found.');
            return $response_message;
        }

        if ($request->amount < $systemSettings->min_deposit && !is_null($systemSettings->min_deposit)) {
            $response_message = $this->customHttpResponse(400, "Amount too small. Minimum deposit is {$systemSettings->min_deposit}.");
            return $response_message;
        }

        if ($request->amount > $systemSettings->max_deposit && !is_null($systemSettings->max_deposit)) {
            $response_message = $this->customHttpResponse(400, "Amount too high. Maximum deposit is {$systemSettings->max_deposit}.");
            return $response_message;
        }


        return $next($request);
    }
}
