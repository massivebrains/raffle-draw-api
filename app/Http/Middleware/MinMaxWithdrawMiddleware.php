<?php

namespace App\Http\Middleware;

use App\Contracts\FormRequest\IWithdrawRequest;
use App\Contracts\Repository\ISysSettingsRepository;
use Closure;
use App\Http\Middleware\BaseMiddleware;

class MinMaxWithdrawMiddleware extends BaseMiddleware
{
    private $sysSettingsRepo;
    private $createRequest;

    public function __construct(ISysSettingsRepository $sysSettingsRepo, IWithdrawRequest $createRequest)
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

        if ($request->amount < $systemSettings->min_withdraw && !is_null($systemSettings->min_withdraw)) {
            $response_message = $this->customHttpResponse(400, "Amount too small.Minimum withdrawal is {$systemSettings->min_withdraw}.");
            return $response_message;
        }


        if ($request->amount > $systemSettings->max_withdraw && !is_null($systemSettings->max_withdraw)) {
            $response_message = $this->customHttpResponse(400, "Amount too high. Maximum withdrawal is {$systemSettings->max_withdraw}.");
            return $response_message;
        }


        return $next($request);
    }
}
