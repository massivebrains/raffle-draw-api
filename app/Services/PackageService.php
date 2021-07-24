<?php

namespace App\Services;

use App\Contracts\Repository\IPackages;
use App\Contracts\Repository\ISysPrize;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPackageService;
use App\DTOs\CreatePackageDTO;
use App\DTOs\CreatePrizeDTO;
use App\DTOs\UpdatePackageDTO;
use App\Utils\Config;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class PackageService extends BaseService implements IPackageService
{

    private $userRepo;
    private $packageRepo;
    private $request;
    private $payload;
    private $config;


    public function __construct(IUser $userRepo, Request $request, IPackages $packageRepo, Config $config)
    {
        $this->userRepo = $userRepo;
        $this->packageRepo = $packageRepo;
        $this->request = $request;
        $this->config = $config;
    }

    private function recordExist($id)
    {
        return $this->packageRepo->find($id);
    }


    public function create()
    {
        $this->payload = $this->request->input();
        $this->name = $this->request->name;

        return $this->processCreate();
    }

    public function update($id)
    {

        $this->user = $this->request->user('api');
        $this->payload = $this->request->all();
        return $this->processUpdate($id);
    }


    private static function getExpiry($arr)
    {
        $defaultCloseTime = "17:00:00"; //5pm 
        $daysBeforeExpire = $arr['period'];
        $packageClostTime = $arr['closes_at'] ?: $defaultCloseTime; //Elvis operator here :)

        $expiryDate = Carbon::now()->addDays($daysBeforeExpire);

        $dateOnly = $expiryDate->toDateString();

        $actualExpireDateTime = $dateOnly . " " . $packageClostTime;

        $res = Carbon::parse($actualExpireDateTime)->subHour();

        return $res;
    }

    private static function getDefaultCurrentSessionCountdown($data)
    {
        $defaultCloseTime = "17:00:00"; //5pm 
        $closeAt  = $data->close_at ?: $defaultCloseTime; //Elvis operator here :);

        $now = Carbon::now();
        $dateOnly = $now->toDateString();
        $actualExpireDateTime = $dateOnly . " " . $closeAt;
        $newSessionStartDate = Carbon::parse($actualExpireDateTime);
        $timeBeforeNextSession = $now->diffInSeconds($newSessionStartDate, false);
        return $timeBeforeNextSession;
    }


    private static function getDefaultNextSessionCountdown($data)
    {
        $defaultCloseTime = "17:00:00"; //5pm 
        $resumptionGap  = $data->new_game_resumption_gap;
        $closeAt  = $data->close_at ?: $defaultCloseTime; //Elvis operator here :);

        $now = Carbon::now();
        $dateOnly = $now->toDateString();
        $actualExpireDateTime = $dateOnly . " " . $closeAt;
        $newSessionStartDate = Carbon::parse($actualExpireDateTime)->addSeconds($resumptionGap);
        $timeBeforeNextSession = $now->diffInSeconds($newSessionStartDate, false);
        return $timeBeforeNextSession;
    }

    private function getCurrentSessionCountdown($data)
    {
        $latestSessionExpiresAt  = $data->latest_session_expires_at;
        $newSessionStartDate = Carbon::parse($latestSessionExpiresAt);
        $now = Carbon::now();
        $timeToEndOfCurrentSession = $now->diffInSeconds($newSessionStartDate, false);
        return $timeToEndOfCurrentSession;
    }

    private function getNextSessionCountdown($data)
    {
        $resumptionGap  = $data->new_game_resumption_gap;
        $latestSessionExpiresAt  = $data->latest_session_expires_at;
        $newSessionStartDate = Carbon::parse($latestSessionExpiresAt)->addSeconds($resumptionGap);
        $now = Carbon::now();
        $timeBeforeNextSession = $now->diffInSeconds($newSessionStartDate, false);
        return $timeBeforeNextSession;
    }


    public function find($id)
    {
        $result = $this->packageRepo->findDetailed($id);
        if ($result) {


            $result->icon = $this->config->generateIconFullPath($result);
            $result->banner = $this->config->generateBannerFullPath($result);

            $result->current_session_ends_in =  $result->latest_session_expires_at ?
                $this->getCurrentSessionCountdown($result) :
                $this->getDefaultCurrentSessionCountdown($result);

            $result->next_session_begins_in = $result->latest_session_expires_at ?
                $this->getNextSessionCountdown($result) :
                $this->getDefaultNextSessionCountdown($result);

            $response_message = $this->customHttpResponse(200, 'Success.', $result);
            return $response_message;
        }
        $response_message = $this->customHttpResponse(400, 'Record does not exist.', $result);
        return $response_message;
    }

    public function findAll()
    {
        $result = $this->packageRepo->findAllDetailed();
        $mappedResult = [];

        foreach ($result as $item) {

            $item->icon = $this->config->generateIconFullPath($item);
            $item->banner = $this->config->generateBannerFullPath($item);

            $item->current_session_ends_in = $item->latest_session_expires_at ?
                $this->getCurrentSessionCountdown($item) :
                $this->getDefaultCurrentSessionCountdown($item);

            $item->next_session_begins_in = $item->latest_session_expires_at ?
                $this->getNextSessionCountdown($item) :
                $this->getDefaultNextSessionCountdown($item);

            $mappedResult[] = $item;
        }


        $response_message = $this->customHttpResponse(200, 'Success.', $mappedResult);
        return $response_message;
    }



    public function processCreate()
    {

        DB::beginTransaction();
        try {

            $createInputData = CreatePackageDTO::fromRequest($this->payload);
            $data = $this->packageRepo->create($createInputData);

            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Entity added successful.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }


    public function processUpdate($id)
    {

        $exist = $this->recordExist($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }


        DB::beginTransaction();
        try {


            $updateInputData = UpdatePackageDTO::fromRequest($this->payload);
            $this->packageRepo->update($id, $updateInputData);

            DB::commit();


            $response_message = $this->customHttpResponse(200, 'Update successful.');
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error.');
            return $response_message;
        }
    }

    public function softDelete($id)
    {
        $exist = $this->recordExist($id);
        if (!$exist) {
            $response_message = $this->customHttpResponse(400, 'Record does not exist.');
            return $response_message;
        }

        try {
            $this->prizeRepo->delete($id);

            $response_message = $this->customHttpResponse(200, 'Entity deleted successful.');
            return $response_message;
        } catch (\Throwable $th) {
            Log::info("Error deleting entity: " . $th);

            $response_message = $this->customHttpResponse(500, 'Delete Error.');
            return $response_message;
        }
    }
}
