<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\InvEmail;
use App\Mail\InvConsolidatedEmail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $obj = new \stdClass();
        // $obj->demo_one = 'Demo One Value';
        // $obj->demo_two = 'Demo Two Value';
        $obj->sender = 'Rico';
        $obj->receiver = 'Joe';
 
        //joe@totalpatriot.com
        //jrixcgeromo@gmail.com

        Mail::to('joe@totalpatriot.com')
        ->bcc(['jrixgeromo@gmail.com'])
        ->send(new InvEmail($obj));
        // http://cb.preparedpatriot.us/inv/mail/send
    }

    public function send_consolidated()
    {
        $obj = new \stdClass();

        $obj->sender = 'Rico';
        $obj->receiver = 'Joe';
 
        Mail::to('jrixcgeromo@gmail.com')
        ->bcc(['jrixgeromo@gmail.com'])
        ->send(new InvConsolidatedEmail($obj));
        // http://cb.preparedpatriot.us/inv/mail/send_consolidated
    }
}
