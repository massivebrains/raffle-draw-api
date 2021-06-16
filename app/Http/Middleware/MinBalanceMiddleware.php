<?php

namespace App\Http\Middleware;

use App\Contracts\FormRequest\IShuffleTicketRequest;
use App\Contracts\FormRequest\IWithdrawRequest;
use App\Contracts\Repository\IGameSession;
use App\Contracts\Repository\ISysSettingsRepository;
use App\Contracts\Repository\IWallet;
use Closure;
use App\Http\Middleware\BaseMiddleware;

class MinBalanceMiddleware extends BaseMiddleware
{
    private $sysSettingsRepo;
    private $walletRepo;
    private $createRequest;

    public function __construct(ISysSettingsRepository $sysSettingsRepo, IWallet $walletRepo, IWithdrawRequest $createRequest)
    {
        $this->sysSettingsRepo = $sysSettingsRepo;
        $this->walletRepo = $walletRepo;
        $this->createRequest = $createRequest;
    }

    public function handle($request, Closure $next)
    {

        $validation = $this->createRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        $userID = $request->user('api')->id;
        $systemSettings = $this->sysSettingsRepo->getSystemSettings();
        $walletInfo  = $this->walletRepo->findByUserID($userID);

        if (!$systemSettings) {
            $response_message = $this->customHttpResponse(400, 'No system settings found.');
            return $response_message;
        }

        if (!$walletInfo) {
            $response_message = $this->customHttpResponse(400, 'Unable to retrieve wallet info');
            return $response_message;
        }

        $balanceAfterWithdrawal  = $walletInfo->amount - $request->amount;

        if ($balanceAfterWithdrawal < $systemSettings->min_balance && !is_null($systemSettings->min_balance)) {
            $response_message = $this->customHttpResponse(400, "Insufficient balance.A minimum amount of {$systemSettings->min_balance} must be in your account to keep it open.Thanks.");
            return $response_message;
        }


        return $next($request);
    }
}
