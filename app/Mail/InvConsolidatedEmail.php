<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\Sku;
use App\InventoryConsolidated;

class InvConsolidatedEmail extends Mailable
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
      createShipInventoryConsolidated_fn();

      $daily_ship_con = InventoryConsolidated::where('prodCode_grp','<>','1')->where('prodCode_grp','<>','b-priority')->orderby('q30_is', 'desc')->get();
      return $this->from('sales@cb.preparedpatriot.us')
                  ->view('mails.inv_consolidated')
                  ->subject("IS & CB Daily Consolidated Inventory Report")
                  ->with('daily_ship', $daily_ship_con);

    }

    // http://localhost/inv/mail/send       - to execute
}
