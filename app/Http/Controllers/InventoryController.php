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

        // created 2 views for the running qty and the new report.
        // loop the running and new port (in relation with the sku_forcb), each needed item will be stored in temporary table 'skus_balance' and will be used in the report
        
        updateImportedProd_fn();

        $getrunning = DB::table('skus_forcb')
                      ->selectRaw(
                            'vw_sku_running_qty.onhand_qty as onhand_qty,
                            vw_new_report_qty.sold_qty as sold_qty,
                            skus_forcb.sku_link as onhand_sku'
                       )
                      ->leftjoin('vw_new_report_qty', 'vw_new_report_qty.SKU1', '=', 'skus_forcb.sku')
                      ->leftjoin('vw_sku_running_qty', 'vw_sku_running_qty.sku', '=', 'skus_forcb.sku')
                      ->where('skus_forcb.lyle_sku', '<>', '')
                      ->where('skus_forcb.lyle_sku', '<>', 'b-priority')
                      ->get();

        DB::table('skus_balance')->delete(); // delete old recored             
        foreach ($getrunning as $key => $running)  // insert new recored
        {
            DB::table('skus_balance')->insert(
            [
                'onhand' => ($running->onhand_qty)? $running->onhand_qty:0, 
                'sold' => ($running->sold_qty)? $running->sold_qty:0, 
                'sku_link' => $running->onhand_sku, 
            ]
            );
        }

        $invs = DB::table('notifications')
                      ->select(
                            'notifications.dt as notifications_date',
                            'lineItems.itemNo as lineItems_itemNo',
                            'lineItems.productTitle as lineItems_productTitle',
                            'lineItems.quantity as lineItems_quantity'
                       )
                      ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
                      ->where('lineItems.itemNo', '<>', '')
                      ->where('lineItems.itemNo', '<>', 'b-priority')
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

        $daily_ship = DB::table('skus')
                      ->selectRaw(
                        'skus.prodCode_grp AS prodCode,
                        skus.prodName_grp AS prodName,
                        MAX(skus_balance.onhand) AS onhand, 
                        MAX(skus_balance.sold) AS sold, 
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
                      ->leftjoin('daily_ship', 'skus.prodCode', '=', 'daily_ship.item_number')
                      ->leftjoin('skus_balance', 'skus.prodCode', '=', 'skus_balance.sku_link')
                      ->where('skus.prodCode', '<>', '1')
                      ->where('skus.prodCode', '<>', '2')
                      ->where('skus.prodCode', '<>', '3')
                      ->where('skus.prodCode', '<>', 'b-priority')
                      ->groupBy('skus.prodCode_grp')
                      ->groupBy('skus.prodName_grp')
                      ->orderby('skus.prodName_grp')
                      //->get();
                      ->paginate(22);

        return view('shipping.inventory', compact('daily_ship'));


        // try {
        //     $users = $user->with('detail')->select(['*', 'name as nick_name'])->sortable()->paginate(10);

        //     return view('user', ['users' => $users]);
        // } catch (\Kyslik\ColumnSortable\Exceptions\ColumnSortableException $e) {
        //     dd($e);
        // }


    }
}
