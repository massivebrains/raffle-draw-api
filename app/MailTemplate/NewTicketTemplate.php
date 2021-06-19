<?php

namespace App\MailTemplate;

class NewTicketTemplate
{
    public static function buildTicket($arr)
    {

        return array_map(function ($elem) {
            return  <<<EOF
                        <li style="margin-bottom:20px;">
                            <span style="color:#000;border-left:5px solid #ff9011;padding-left:20px;">
                                   {$elem}
                            </span>
                        </li>
EOF;
        }, $arr);
    }


    public static function getHtml($detail)
    {
        $name = ucfirst($detail['name']);
        $arr = $detail['tickets'];
        $price = $detail['price'];
        $sessionID = $detail['session_id'];
        // $arr = ['p32323h3h3b23'];
        $tickets = implode("", self::buildTicket($arr));
        $html = <<<EOF
           
<div style="padding:0 20px;font-family:arial">

    <div style="font-weight:bold;font-size:15px;padding-bottom:20px">
            Hi {$name},
    </div>

    <div style="color:#000;">
            
        <div style="color:#000;">
            We're just letting you know that your payment was received and ticket(s) generated successfully.
            <p>Below are your ticket(s) details:</p>
        </div>

        <div class="activation-btn-cont" style="padding:40px;">
          <ul style="padding:0px;font-size:20px;font-weight:bold;list-style:none">
             {$tickets}
          </ul>
          <div style="font-size:10px;margin-bottom:10px;">
             <span style="margin-right:10px;color:#ff9011">Package Price :</span><br />
             <span style="font-weight:bold;">&#8358;{$price}</span>
          </div>
          <div style="font-size:10px;margin-bottom:10px;">
            <span style="margin-right:10px;color:#ff9011">Game/Session ID :</span><br />
            <span style="font-weight:bold;">{$sessionID}</span>
        </div>
        </div>
        <div style="color:#000;">
            Please keep this ticket(s) safe and only to yourself as that is the only valid pass to claim 
            your prize should you win.
        </div>
        <p>Thanks and wishing you the best.</p>

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
