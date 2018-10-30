<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The demo object instance.
     *
     * @var sendmail
     */
    public $sendmail;
 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendmail)
    {
        //
        $this->sendmail = $sendmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jrixgeromo@gmail.com')
                    ->view('mails.inv')
                    ->text('mails.inv_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                      ->attach(public_path('/images').'/test.jpg', [
                              'as' => 'test.jpg',
                              'mime' => 'image/jpeg',
                      ]);
    }
}
