<?php

namespace App\MailTemplate;

class RegistrationTemplate
{
    public static function getHtml($detail)
    {
        $name = ucfirst($detail['name']);
        $link = "http://raffle.ezugudor.com/api/email_verify_code/{$detail['verify_code']}";
        $html = <<<EOF
           
<div style="padding:0 20px;font-family:arial">
    <div style="font-weight:bold;font-size:30px;text-align:center">
            <h4 style="border-bottom:2px solid #ff9011;padding:0px 20px 20px">Welcome !</h4>
    </div>

    <div style="font-weight:bold;font-size:20px;padding-bottom:20px">
            Hi {$name},
    </div>

    <div style="color:#000;">
            
        <div style="color:#000;">
            Welcome to {$detail['company']} game.
            Click on the button below to activate your account.
        </div>

        <div class="activation-btn-cont" style="text-align:center;padding:40px 0;">
           <a href="{$link}" style="
           background:#ff9011; 
           color:#fff; 
           padding:10px 20px;
           border-radius:4px;
           text-decoration:none;
           ">Activate Account</a>
        </div>
        <div style="color:#000;">
            Alternatively, you can visit this link  
            <a href="{$link}">{$link}</a> 
            in your browser to activate your
            account if the button above does not work for you.
        </div>
        <p>Thanks.</p>

        <div style="color:#000;margin-top:40px">
           <div style="color:#000;font-weight:bold">Our Best</div>
           <div>The Land Lotto Team</div>
        </div>
    </div>
</div>


EOF;

        return $html;
    }
}
