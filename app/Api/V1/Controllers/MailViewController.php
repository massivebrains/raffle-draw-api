<?php


namespace App\Api\V1\Controllers;

use App\Contracts\FormRequest\ICreatePrizeRequest;
use App\Contracts\Repository\IUser;
use App\Contracts\Services\IPrizeService;
use App\MailTemplate\NewTicketTemplate;
use App\MailTemplate\RegistrationTemplate;
use App\MailTemplate\ResetPasswordTemplate;
use App\Utils\UserMapper;
use Illuminate\Http\Request;


class MailViewController extends BaseController
{

    private $userRepo;
    private $prizeService;

    public function __construct(IUser $userRepo, IPrizeService $prizeService)
    {
        $this->userRepo = $userRepo;
        $this->prizeService = $prizeService;
    }


    public function reg()
    {
        $detail = ['name' => 'udor', 'company' => 'Land Lotto', 'verify_code' => 'fdaf7df8asf', 'email' => 'nelsonsmrt@gmail.com'];
        // $aa = RegistrationTemplate::getHtml($detail);
        $aa = ResetPasswordTemplate::getHtml($detail);
        // var_dump($aa);
        return $aa;
    }
}
