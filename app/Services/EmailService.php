<?php

namespace App\Services;

use App\Contracts\Services\IEmailService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailService extends BaseService implements IEmailService
{

    private $user;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user =  $this->request->user('api');
    }

    public function sendMail(string $recipient, string $subject, $body)
    {

        try {
            Mail::send([], [], function ($message) use ($recipient, $subject, $body) {
                $message->to($recipient)
                    ->subject($subject)
                    ->setBody($body, 'text/html');
            });

            if (Mail::failures()) {
                throw new Exception("new error");
                Log::info("there is failure sending mail");
            } else {
                Log::info("mail sent");
            }
        } catch (\Throwable $th) {
            Log::info("there is failure sending mail" . $th);
        }
    }
}
