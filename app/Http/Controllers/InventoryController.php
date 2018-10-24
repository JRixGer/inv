<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function list()
    {
        $invs = DB::table('notifications')
                      ->select(
                            'notifications.dt as notifications_date',
                            'lineItems.itemNo as lineItems_itemNo',
                            'lineItems.productTitle as lineItems_productTitle',
                            'lineItems.quantity as lineItems_quantity'
                       )
                      ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
                      ->where('lineItems.itemNo', '<>', '')
                      ->where('notifications.transactionType', '<>', 'TEST')
                       ->where('notifications.transactionType', '<>', 'TEST_SALE')
                      ->orderby('notifications.id', 'desc')
                      ->get();

        $date_now_front = date('Y-m-d 00:00:00');
        $date_now_front_num = strtotime(date('Y-m-d 00:00:00'));

        $inventory_date1_1 = strtotime('-1 day' , strtotime($date_now_front));
        $inventory_date7 = strtotime('-6 days' , strtotime($date_now_front));
        $inventory_date14 = strtotime('-13 days' , strtotime($date_now_front));
        $inventory_date30 = strtotime('-29 days' , strtotime($date_now_front));
        $date_2days = strtotime('-2 days' , strtotime($date_now_front)); 
        $date_3days = strtotime('-3 days' , strtotime($date_now_front)); 
        $date_4days = strtotime('-4 days' , strtotime($date_now_front)); 
        $date_5days = strtotime('-5 days' , strtotime($date_now_front)); 
        $date_6days = strtotime('-6 days' , strtotime($date_now_front)); 
        $date_7days = strtotime('-7 days' , strtotime($date_now_front)); 
        $date_8days = strtotime('-8 days' , strtotime($date_now_front)); 
        $date_9days = strtotime('-9 days' , strtotime($date_now_front)); 
        $date_10days = strtotime('-10 days' , strtotime($date_now_front)); 
        $date_11days = strtotime('-11 days' , strtotime($date_now_front)); 
        $date_12days = strtotime('-12 days' , strtotime($date_now_front)); 

        //to

        $date_now2_front = date('Y-m-d 23:59:59');
        $inventory_date2_2 = strtotime('-1 day' , strtotime($date_now2_front));
        $inventory_date_7 = strtotime('-7 days' , strtotime($date_now2_front));
        $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));

        $date_2_days = strtotime('-2 days' , strtotime($date_now2_front)); 
        $date_3_days = strtotime('-3 days' , strtotime($date_now2_front)); 
        $date_4_days = strtotime('-4 days' , strtotime($date_now2_front)); 
        $date_5_days = strtotime('-5 days' , strtotime($date_now2_front)); 
        $date_6_days = strtotime('-6 days' , strtotime($date_now2_front)); 
        $date_7_days = strtotime('-7 days' , strtotime($date_now2_front)); 
        $date_8_days = strtotime('-8 days' , strtotime($date_now2_front)); 
        $date_9_days = strtotime('-9 days' , strtotime($date_now2_front)); 
        $date_10_days = strtotime('-10 days' , strtotime($date_now2_front)); 
        $date_11_days = strtotime('-11 days' , strtotime($date_now2_front)); 
        $date_12_days = strtotime('-12 days' , strtotime($date_now2_front)); 

        
        DB::table('daily_ship')->delete();
        
        foreach ($invs as $key => $inv) 
        {

            $qty4 = ($date_now_front_num >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_now2_front? $inv->lineItems_quantity : 0);  
            $qty5 = ($inventory_date1_1 >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $inventory_date2_2? $inv->lineItems_quantity: 0);        
            $qty7 = ($inventory_date7 >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_now2_front? $inv->lineItems_quantity: 0); 
            $qty14 = ($inventory_date14 >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_now2_front? $inv->lineItems_quantity: 0);        
            $qty30 = ($inventory_date30 >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_now2_front? $inv->lineItems_quantity: 0);        

            $qty01 = ($date_2days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_2_days? $inv->lineItems_quantity: 0);   
            $qty02 = 0;      
            $qty03 = ($date_3days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_3_days? $inv->lineItems_quantity: 0);        
            $qty04 = ($date_4days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_4_days? $inv->lineItems_quantity: 0);        
            $qty05 = ($date_5days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_5_days? $inv->lineItems_quantity: 0);        
            $qty06 = ($date_6days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_6_days? $inv->lineItems_quantity: 0);        
            $qty07 = ($date_7days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_7_days? $inv->lineItems_quantity: 0); 
            $qty08 = ($date_8days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_8_days? $inv->lineItems_quantity: 0); 
            $qty09 = ($date_9days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_9_days? $inv->lineItems_quantity: 0); 
            $qty10 = ($date_10days >= strtotime($inv->notifications_date) && strtotime($inv->notifications_date) <= $date_10_days? $inv->lineItems_quantity: 0); 
            
            DB::table('daily_ship')->insert(
              [
                'item_number' => $inv->lineItems_itemNo, 
                'description' => $inv->lineItems_productTitle, 
                'qty01' => $qty01, 
                'qty02' => $qty02, 
                'qty03' => $qty03, 
                'qty04' => $qty04, 
                'qty05' => $qty05, 
                'qty06' => $qty06, 
                'qty07' => $qty07, 
                'qty08' => $qty08, 
                'qty09' => $qty09, 
                'qty10' => $qty10,
                'qty4' => $qty4,  
                'qty5' => $qty5,  
                'qty7' => $qty7,  
                'qty14' => $qty14, 
                'qty30' => $qty30              ]
            );

        }

        $daily_ship = DB::table('daily_ship')
                      ->selectRaw(
                        'item_number,
                        description,
                        SUM(qty01) AS qty01,
                        SUM(qty02) AS qty02,
                        SUM(qty03) AS qty03,
                        SUM(qty04) AS qty04,
                        SUM(qty05) AS qty05,
                        SUM(qty06) AS qty06,
                        SUM(qty07) AS qty07,
                        SUM(qty08) AS qty08,
                        SUM(qty09) AS qty09,
                        SUM(qty10) AS qty10,
                        SUM(qty04) AS qty4,
                        SUM(qty05) AS qty5,
                        SUM(qty07) AS qty7,
                        SUM(qty14) AS qty14,
                        SUM(qty30) AS qty30'
                      )
                      ->groupBy('item_number')
                      ->groupBy('description')
                      ->get();

        return view('shipping.inventory', compact('daily_ship'));

    }


}
