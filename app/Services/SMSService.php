<?php

namespace App\Services;

use App\Contracts\Services\ISMSService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;



class SMSService extends BaseService implements ISMSService
{

    private $user;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user =  $this->request->user('api');
    }

    public function sendMessage(string $recipientPhone, string $message)
    {

        if (strlen($recipientPhone) === 11) {
            $recipientPhone = "+234" . $recipientPhone;
        }
        // Log::info($recipientPhone);
        try {

            $account_sid = config('services.twilio_acc_sid');
            $auth_token = config('services.twilio_auth_token');

            // A Twilio number you own with SMS capabilities
            $twilio_number = "Landlotto";

            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                // Where to send a text message (your cell phone?)
                $recipientPhone,
                array(
                    'from' => $twilio_number,
                    'body' => $message
                )
            );
        } catch (\Throwable $th) {
            Log::info("there is failure sending mail" . $th);
        }
    }
}
