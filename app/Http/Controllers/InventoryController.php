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

        //updateProd_fn();
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


        $date_now_front = date('n/j/Y', strtotime('now')).' 00:00:00';
        $date_now_front_num = strtotime($date_now_front);


        $inventory_date30 = strtotime('-30 days' , strtotime($date_now_front));
        $date_1day = strtotime('-1 day' , strtotime($date_now_front)); 
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
        $date_13days = strtotime('-13 days' , strtotime($date_now_front)); 
        $date_14days = strtotime('-14 days' , strtotime($date_now_front)); 


        //to

        $date_now2_front = date('n/j/Y', strtotime('now')).' 23:59:59';
        $date_now2_front_num = strtotime($date_now_front);

        $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));
        $date_1_day = strtotime('-1 day' , strtotime($date_now2_front)); 
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
        $date_13_days = strtotime('-13 days' , strtotime($date_now2_front)); 
        $date_14_days = strtotime('-14 days' , strtotime($date_now2_front)); 
        
        DB::table('daily_ship')->delete();
  
        foreach ($invs as $key => $inv) 
        {

            $qty30 = ((int)$inventory_date30 <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_now2_front_num? $inv->lineItems_quantity: 0);        
            $qty01 = ((int)$date_1day <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_1_day? $inv->lineItems_quantity: 0);   
            $qty02 = ((int)$date_2days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_2_days? $inv->lineItems_quantity: 0);   
            $qty03 = ((int)$date_3days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_3_days? $inv->lineItems_quantity: 0);        
            $qty04 = ((int)$date_4days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_4_days? $inv->lineItems_quantity: 0);        
            $qty05 = ((int)$date_5days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_5_days? $inv->lineItems_quantity: 0);        
            $qty06 = ((int)$date_6days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_6_days? $inv->lineItems_quantity: 0);        
            $qty07 = ((int)$date_7days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_7_days? $inv->lineItems_quantity: 0); 
            $qty08 = ((int)$date_8days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_8_days? $inv->lineItems_quantity: 0); 
            $qty09 = ((int)$date_9days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_9_days? $inv->lineItems_quantity: 0); 
            $qty10 = ((int)$date_10days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_10_days? $inv->lineItems_quantity: 0); 
            $qty11 = ((int)$date_11days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_11_days? $inv->lineItems_quantity: 0); 
            $qty12 = ((int)$date_12days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_12_days? $inv->lineItems_quantity: 0); 
            $qty13 = ((int)$date_13days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_13_days? $inv->lineItems_quantity: 0);
            $qty14 = ((int)$date_14days <= (int)strtotime($inv->notifications_date) && (int)strtotime($inv->notifications_date) <= (int)$date_14_days? $inv->lineItems_quantity: 0);

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
                'qty11' => $qty11, 
                'qty12' => $qty12,
                'qty13' => $qty13,
                'qty14' => $qty14, 
                'qty30' => $qty30
            ]
            );

        }

        $daily_ship = DB::table('daily_ship')
                      ->selectRaw(
                        'daily_ship.item_number AS item_number,
                        daily_ship.description AS description,
                        skus.prodQty AS prodQty, 
                        SUM(daily_ship.qty01) AS qty01,
                        SUM(daily_ship.qty02) AS qty02,
                        SUM(daily_ship.qty03) AS qty03,
                        SUM(daily_ship.qty04) AS qty04,
                        SUM(daily_ship.qty05) AS qty05,
                        SUM(daily_ship.qty06) AS qty06,
                        SUM(daily_ship.qty07) AS qty07,
                        SUM(daily_ship.qty08) AS qty08,
                        SUM(daily_ship.qty09) AS qty09,
                        SUM(daily_ship.qty10) AS qty10,
                        SUM(daily_ship.qty11) AS qty11,
                        SUM(daily_ship.qty12) AS qty12,
                        SUM(daily_ship.qty12) AS qty13,
                        SUM(daily_ship.qty04) AS qty4,
                        SUM(daily_ship.qty05) AS qty5,
                        SUM(daily_ship.qty07) AS qty7,
                        SUM(daily_ship.qty14) AS qty14,
                        SUM(daily_ship.qty30) AS qty30'
                      )
                      ->leftjoin('skus', 'skus.prodCode', '=', 'daily_ship.item_number')
                      ->groupBy('daily_ship.item_number')
                      ->groupBy('daily_ship.description')
                      ->groupBy('skus.prodQty')
                      ->get();

        return view('shipping.inventory', compact('daily_ship'));

    }




}
