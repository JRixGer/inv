<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\Sku;
use App\Inventory;

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

      updateProd_fn();
      updateInventory_fn();
      
      $daily_ship = Inventory::orderBy('qty30', 'desc')->get();
      
      return $this->from('sales@cb.preparedpatriot.us')
                  ->view('mails.inv')
                  ->subject("CB Daily Inventory Report")
                  //->text('mails.inv_plain')
                  ->with('daily_ship_inv', $daily_ship);
                  // ->attach(public_path('/images').'/test.jpg', [
                  //           'as' => 'test.jpg',
                  //           'mime' => 'image/jpeg',
                  // ]);
    }

    // http://localhost/inv/mail/send       - to execute
}
