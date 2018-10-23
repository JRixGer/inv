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
                      ->orderby('notifications.id', 'desc')
                      ->get();

        $date_now_front = date('Y-m-d 00:00:00');
        $inventory_date1_1 = strtotime('-1 day' , strtotime($date_now_front));
        $inventory_date1_1 = date('Y-m-d H:i:s', $inventory_date1_1);

        $inventory_date7 = strtotime('-6 days' , strtotime($date_now_front));
        $inventory_date7 = date('Y-m-d H:i:s', $inventory_date7);

        $inventory_date14 = strtotime('-13 days' , strtotime($date_now_front));
        $inventory_date14 = date('Y-m-d H:i:s', $inventory_date14);

        $inventory_date30 = strtotime('-29 days' , strtotime($date_now_front));
        $inventory_date30 = date('Y-m-d H:i:s', $inventory_date30);

        $date_2days = strtotime('-2 days' , strtotime($date_now_front)); 
        $date_2days = date('Y-m-d H:i:s' , $date_2days); 

        $date_3days = strtotime('-3 days' , strtotime($date_now_front)); 
        $date_3days = date('Y-m-d H:i:s' , $date_3days); 
     
        $date_4days = strtotime('-4 days' , strtotime($date_now_front)); 
        $date_4days = date('Y-m-d H:i:s' , $date_4days); 
     
        $date_5days = strtotime('-5 days' , strtotime($date_now_front)); 
        $date_5days = date('Y-m-d H:i:s' , $date_5days); 
       
        $date_6days = strtotime('-6 days' , strtotime($date_now_front)); 
        $date_6days = date('Y-m-d H:i:s' , $date_6days);
       
        $date_7days = strtotime('-7 days' , strtotime($date_now_front)); 
        $date_7days = date('Y-m-d H:i:s' , $date_7days);
        
        $date_8days = strtotime('-8 days' , strtotime($date_now_front)); 
        $date_8days = date('Y-m-d H:i:s' , $date_8days);
      
        $date_9days = strtotime('-9 days' , strtotime($date_now_front)); 
        $date_9days = date('Y-m-d H:i:s' , $date_9days);
       
        $date_10days = strtotime('-10 days' , strtotime($date_now_front)); 
        $date_10days = date('Y-m-d H:i:s' , $date_10days);
        
        $date_11days = strtotime('-11 days' , strtotime($date_now_front)); 
        $date_11days = date('Y-m-d H:i:s' , $date_11days);
        
        $date_12days = strtotime('-12 days' , strtotime($date_now_front)); 
        $date_12days = date('Y-m-d H:i:s' , $date_12days);

        //to

        $date_now2_front = date('Y-m-d 23:59:59');

        $inventory_date2_2 = strtotime('-1 day' , strtotime($date_now2_front));
        $inventory_date2_2 = date('Y-m-d H:i:s', $inventory_date2_2);

        $inventory_date_7 = strtotime('-7 days' , strtotime($date_now2_front));
        $inventory_date_7 = date('Y-m-d H:i:s', $inventory_date_7);

        $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));
        $inventory_date_30 = date('Y-m-d H:i:s', $inventory_date_30);
        
        DB::table('daily_ship')->delete();
        
        foreach ($invs as $key => $inv) 
        {

            $qty4 = ($date_now_front >= strtotime($inv->notifications_date) && $date_now2_front <= strtotime($inv->notifications_date)? $inv->lineItems_quantity : 0);  
            $qty5 = ($inventory_date1_1 >= strtotime($inv->notifications_date) && $inventory_date2_2 <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        
            $qty7 = ($inventory_date7 >= strtotime($inv->notifications_date) && $date_now2_front <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0); 
            $qty14 = ($inventory_date14 >= strtotime($inv->notifications_date) && $date_now2_front <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        
            $qty30 = ($inventory_date30 >= strtotime($inv->notifications_date) && $date_now2_front <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        

            $qty01 = ($date_2days >= strtotime($inv->notifications_date) && $date_2_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);   
            $qty02 = 0;      
            $qty03 = ($date_3days >= strtotime($inv->notifications_date) && $date_3_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        
            $qty04 = ($date_4days >= strtotime($inv->notifications_date) && $date_4_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        
            $qty05 = ($date_5days >= strtotime($inv->notifications_date) && $date_5_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        
            $qty06 = ($date_6days >= strtotime($inv->notifications_date) && $date_6_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0);        
            $qty07 = ($date_7days >= strtotime($inv->notifications_date) && $date_7_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0); 
            $qty08 = ($date_8days >= strtotime($inv->notifications_date) && $date_8_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0); 
            $qty09 = ($date_9days >= strtotime($inv->notifications_date) && $date_9_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0); 
            $qty10 = ($date_10days >= strtotime($inv->notifications_date) && $date_10_days <= strtotime($inv->notifications_date)? $inv->lineItems_quantity: 0); 
            
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
                      ->select('daily_ship.*')
                      ->get();

        return view('shipping.inventory', compact('daily_ship'));

    }


}
