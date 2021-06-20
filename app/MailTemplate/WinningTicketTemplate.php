<?php

namespace App\MailTemplate;

class WinningTicketTemplate
{

    public static function getHtml($detail)
    {
        $name = ucfirst($detail['name']);
        $sessionID = $detail['session_id'];
        // $arr = ['p32323h3h3b23'];
        $tickets = $detail['ticket'];
        $html = <<<EOF
           
<div style="padding:0 20px;font-family:arial">

    <div style="font-weight:bold;font-size:15px;padding-bottom:20px">
            Hi {$name},
    </div>

    <div style="color:#000;">
            
        <div style="color:#000;">
            We are happy to annouce to you that your ticket with details below has been picked in our last draw.
            <p>Ticket details:</p>
        </div>

        <div class="activation-btn-cont" style="padding:40px;">
          <ul style="padding:0px;font-size:20px;font-weight:bold;list-style:none">
             {$tickets}
          </ul>
          <div style="font-size:10px;margin-bottom:10px;">
            <span style="margin-right:10px;color:#ff9011">Game/Session ID :</span><br />
            <span style="font-weight:bold;">{$sessionID}</span>
        </div>
        </div>
        <div style="color:#000;">
            You will be contacted shortly on how to claim your prize.
        </div>
        <p>Congrats once again and thanks for participating.</p>

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
