<?php

//////////////////////////////////////
// global functions here :)
//////////////////////////////////////


// starts here: below codes are for the automatic creation of SKU in case its not yet created yet. it will happen every each INS instance

function updateProd_fn()
{

	$check_sku = DB::table('skus')
      ->select('prodCode')
      ->groupby('prodCode')
      ->get();

	
	$prodCodes = array();
	foreach ($check_sku as $key => $p) 
    {
    	$prodCodes[] = $p->prodCode; 
    }         

	$check_in_items = DB::table('lineItems')
      ->select('itemNo', 'productTitle', 'lineItemType')
      ->whereNotIn('itemNo', $prodCodes)
      ->groupby('itemNo', 'productTitle', 'lineItemType')
      ->get();


	foreach ($check_in_items as $key => $i) 
    {
        DB::table('skus')->insert(
        [
            'prodCode' => $i->itemNo, 
            'prodName' => $i->productTitle, 
            'prodQty' => 0, 
            'prodType' => $i->lineItemType ,
            'prodCode_grp' => $i->itemNo, 
            'prodName_grp' => $i->productTitle,
            'prodName_common' => $i->productTitle
        ]
        );

    }    

/////////////////////////////////////////////

 $recheck_sku1 = DB::table('skus')
      ->select('prodCode')
      ->groupby('prodCode')
      ->get();

  
  $prodCodes_other1 = array();
  foreach ($recheck_sku1 as $key => $p) 
    {
      $prodCodes_other1[] = $p->prodCode; 
    }         

  $check_in_items1 = DB::connection('mysql2')->table('vw_skus')
      ->select('sku_link', 'description')
      ->whereNotIn('sku_link', $prodCodes_other1)
      ->where('sku_link', '<>', '')
      ->where('status', '=', 'activated')
      ->groupby('sku_link', 'description')
      ->get();


  foreach ($check_in_items1 as $key => $i) 
    {
        DB::table('skus')->insert(
        [
            'prodCode' => $i->sku_link, 
            'prodName' => $i->description, 
            'prodQty' => 0, 
            'prodType' => 'Imported',
            'prodCode_grp' => strtolower($i->sku_link), 
            'prodName_grp' => $i->description,
            'prodName_common' => $i->description            
        ]
        );

    }   

/////////////////////////////////////////////

  $recheck_sku2 = DB::table('skus')
      ->select('prodCode')
      ->groupby('prodCode')
      ->get();

  
  $prodCodes_other2 = array();
  foreach ($recheck_sku2 as $key => $p) 
    {
      $prodCodes_other2[] = $p->prodCode; 
    }         

   $check_in_items2 = DB::connection('mysql2')->table('vw_skus')
      ->select('sku', 'description')
      ->whereNotIn('sku', $prodCodes_other2)
      ->where('sku', '<>', '')
      ->where('status', '=', 'activated')
      ->groupby('sku', 'description')
      ->get();


  foreach ($check_in_items2 as $key => $i) 
    {
        DB::table('skus')->insert(
        [
            'prodCode' => $i->sku, 
            'prodName' => $i->description, 
            'prodQty' => 0, 
            'prodType' => 'Imported',
            'prodCode_grp' => strtolower($i->sku), 
            'prodName_grp' => $i->description,
            'prodName_common' => $i->description  
        ]
        );

    }    

/////////////////////////////////////////////

  $recheck_sku3 = DB::table('skus')
      ->select('prodCode')
      ->groupby('prodCode')
      ->get();

  
  $prodCodes_other3 = array();
  foreach ($recheck_sku3 as $key => $p) 
    {
      $prodCodes_other3[] = $p->prodCode; 
    }         

   $check_in_items3 = DB::connection('mysql2')->table('vw_skus')
      ->select('item_number', 'description')
      ->whereNotIn('item_number', $prodCodes_other3)
      ->where('item_number', '<>', '')
      ->where('status', '=', 'activated')
      ->groupby('item_number', 'description')
      ->get();


  foreach ($check_in_items3 as $key => $i) 
    {
        DB::table('skus')->insert(
        [
            'prodCode' => $i->item_number, 
            'prodName' => $i->description, 
            'prodQty' => 0, 
            'prodType' => 'Imported',
            'prodCode_grp' => strtolower($i->item_number), 
            'prodName_grp' => $i->description,
            'prodName_common' => $i->description  
        ]
        );

    }    

/////////////////////////////////////////////

  $recheck_sku1 = DB::table('skus_is')
      ->select('sku')
      ->groupby('sku')
      ->get();
 
  $prodCodes_other1 = array();
  foreach ($recheck_sku1 as $key => $p) 
    {
      $prodCodes_other1[] = $p->sku;
    }         

  $check_in_items1 = DB::connection('mysql2')->table('vw_skus')
      ->select('sku', 'lyle_sku', 'item_number', 'description')
      ->whereNotIn('sku', $prodCodes_other1)
      ->where('sku', '<>', '')
      ->where('status', '=', 'activated')
      ->groupby('sku', 'lyle_sku', 'item_number', 'description')
      ->get();


  foreach ($check_in_items1 as $key => $i) 
    {
        DB::table('skus_is')->insert(
        [
            'sku' => $i->sku, 
            'lyle_sku' => $i->lyle_sku, 
            'description' => $i->description, 
            'item_number' => $i->item_number
        ]
        );

    }   

  //////////////  

  $recheck_sku2 = DB::table('skus_is')
      ->select('lyle_sku')
      ->groupby('lyle_sku')
      ->get();
 
  $prodCodes_other2 = array();
  foreach ($recheck_sku2 as $key => $p) 
    {
      $prodCodes_other2[] = $p->lyle_sku;
    }

  $check_in_items2 = DB::connection('mysql2')->table('vw_skus')
      ->select('sku', 'lyle_sku', 'item_number', 'description')
      ->whereNotIn('lyle_sku', $prodCodes_other2)
      ->where('lyle_sku', '<>', '')
      ->where('status', '=', 'activated')
      ->groupby('sku', 'lyle_sku', 'item_number', 'description')
      ->get();




  foreach ($check_in_items2 as $key => $i) 
    {
        DB::table('skus_is')->insert(
        [
            'sku' => $i->sku, 
            'lyle_sku' => $i->lyle_sku, 
            'description' => $i->description, 
            'item_number' => $i->item_number
        ]
        );

    }   

///////////////////////

  $recheck_sku3 = DB::table('skus_is')
      ->select('item_number')
      ->groupby('item_number')
      ->get();
 
  $prodCodes_other3 = array();
  foreach ($recheck_sku3 as $key => $p) 
    {

      $prodCodes_other3[] = $p->item_number; 
    }         


  $check_in_items3 = DB::connection('mysql2')->table('vw_skus')
      ->select('sku', 'lyle_sku', 'item_number', 'description')
      ->whereNotIn('item_number', $prodCodes_other3)
      ->where('item_number', '<>', '')
      ->where('status', '=', 'activated')
      ->groupby('sku', 'lyle_sku', 'item_number', 'description')
      ->get();


  foreach ($check_in_items3 as $key => $i) 
    {
        DB::table('skus_is')->insert(
        [
            'sku' => $i->sku, 
            'lyle_sku' => $i->lyle_sku, 
            'description' => $i->description, 
            'item_number' => $i->item_number
        ]
        );

    }   

}


function updateInventory_fn()
{


  
  $getrunning = DB::connection('mysql2')->table('vw_skus')
                ->selectRaw(
                      'vw_sku_running_qty.onhand_qty as onhand_qty,
                      vw_new_report_qty.sold_qty as sold_qty,
                      vw_skus.sku_link as onhand_sku,
                      vw_skus.description as prodName_common'
                 )
                ->leftjoin('vw_new_report_qty', 'vw_new_report_qty.SKU1', '=', 'vw_skus.sku')
                ->leftjoin('vw_sku_running_qty', 'vw_sku_running_qty.sku', '=', 'vw_skus.sku')
                ->where('vw_skus.lyle_sku', '<>', '')
                ->where('vw_skus.lyle_sku', '<>', 'b-priority')
                ->where('vw_skus.status', '=', 'activated')
                ->get();

  DB::table('skus_balance')->delete(); // delete old recored             
  foreach ($getrunning as $key => $running)  // insert new recored
  {
      DB::table('skus_balance')->insert(
      [
          'onhand' => ($running->onhand_qty)? $running->onhand_qty:0, 
          'sold' => ($running->sold_qty)? $running->sold_qty:0, 
          'sku_link' => $running->onhand_sku, 
          'prodName_common' => $running->prodName_common 
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
  $date_1day = strtotime($date_now_front); 
  $date_2days = strtotime('-1 day' , strtotime($date_now_front)); 
  $date_3days = strtotime('-2 days' , strtotime($date_now_front)); 
  $date_4days = strtotime('-3 days' , strtotime($date_now_front)); 
  $date_5days = strtotime('-4 days' , strtotime($date_now_front)); 
  $date_6days = strtotime('-5 days' , strtotime($date_now_front)); 
  $date_7days = strtotime('-6 days' , strtotime($date_now_front)); 
  $date_8days = strtotime('-7 days' , strtotime($date_now_front)); 
  $date_9days = strtotime('-8 days' , strtotime($date_now_front)); 
  $date_10days = strtotime('-9 days' , strtotime($date_now_front)); 
  $date_11days = strtotime('-10 days' , strtotime($date_now_front)); 
  $date_12days = strtotime('-11 days' , strtotime($date_now_front)); 
  $date_13days = strtotime('-12 days' , strtotime($date_now_front)); 
  $date_14days = strtotime('-13 days' , strtotime($date_now_front)); 
  //to

  $date_now2_front = date('n/j/Y', strtotime('now')).' 23:59:59';
  $date_now2_front_num = strtotime($date_now_front);

  $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));
  $date_1_day = strtotime($date_now2_front); 
  $date_2_days = strtotime('-1 day' , strtotime($date_now2_front)); 
  $date_3_days = strtotime('-2 days' , strtotime($date_now2_front)); 
  $date_4_days = strtotime('-3 days' , strtotime($date_now2_front)); 
  $date_5_days = strtotime('-4 days' , strtotime($date_now2_front)); 
  $date_6_days = strtotime('-5 days' , strtotime($date_now2_front)); 
  $date_7_days = strtotime('-6 days' , strtotime($date_now2_front)); 
  $date_8_days = strtotime('-7 days' , strtotime($date_now2_front)); 
  $date_9_days = strtotime('-8 days' , strtotime($date_now2_front)); 
  $date_10_days = strtotime('-9 days' , strtotime($date_now2_front)); 
  $date_11_days = strtotime('-10 days' , strtotime($date_now2_front)); 
  $date_12_days = strtotime('-11 days' , strtotime($date_now2_front)); 
  $date_13_days = strtotime('-12 days' , strtotime($date_now2_front)); 
  $date_14_days = strtotime('-13 days' , strtotime($date_now2_front)); 

  
  DB::table('daily_ship')->delete();

  foreach ($invs as $key => $inv) 
  {
      
      $qty30 = ((int)strtotime($inv->notifications_date) >= (int)$inventory_date30  && (int)strtotime($inv->notifications_date) <= (int)$date_now2_front_num? $inv->lineItems_quantity: 0);     
      $qty01 = ((int)strtotime($inv->notifications_date) >= (int)$date_1day && (int)strtotime($inv->notifications_date) <= (int)$date_1_day? $inv->lineItems_quantity: 0);   
      $qty02 = ((int)strtotime($inv->notifications_date) >= (int)$date_2days && (int)strtotime($inv->notifications_date) <= (int)$date_2_days? $inv->lineItems_quantity: 0);   
      $qty03 = ((int)strtotime($inv->notifications_date) >= (int)$date_3days && (int)strtotime($inv->notifications_date) <= (int)$date_3_days? $inv->lineItems_quantity: 0);        
      $qty04 = ((int)strtotime($inv->notifications_date) >= (int)$date_4days && (int)strtotime($inv->notifications_date) <= (int)$date_4_days? $inv->lineItems_quantity: 0);        
      $qty05 = ((int)strtotime($inv->notifications_date) >= (int)$date_5days && (int)strtotime($inv->notifications_date) <= (int)$date_5_days? $inv->lineItems_quantity: 0);        
      $qty06 = ((int)strtotime($inv->notifications_date) >= (int)$date_6days && (int)strtotime($inv->notifications_date) <= (int)$date_6_days? $inv->lineItems_quantity: 0);        
      $qty07 = ((int)strtotime($inv->notifications_date) >= (int)$date_7days && (int)strtotime($inv->notifications_date) <= (int)$date_7_days? $inv->lineItems_quantity: 0); 
      $qty08 = ((int)strtotime($inv->notifications_date) >= (int)$date_8days && (int)strtotime($inv->notifications_date) <= (int)$date_8_days? $inv->lineItems_quantity: 0); 
      $qty09 = ((int)strtotime($inv->notifications_date) >= (int)$date_9days && (int)strtotime($inv->notifications_date) <= (int)$date_9_days? $inv->lineItems_quantity: 0); 
      $qty10 = ((int)strtotime($inv->notifications_date) >= (int)$date_10days && (int)strtotime($inv->notifications_date) <= (int)$date_10_days? $inv->lineItems_quantity: 0); 
      $qty11 = ((int)strtotime($inv->notifications_date) >= (int)$date_11days && (int)strtotime($inv->notifications_date) <= (int)$date_11_days? $inv->lineItems_quantity: 0); 
      $qty12 = ((int)strtotime($inv->notifications_date) >= (int)$date_12days && (int)strtotime($inv->notifications_date) <= (int)$date_12_days? $inv->lineItems_quantity: 0); 
      $qty13 = ((int)strtotime($inv->notifications_date) >= (int)$date_13days && (int)strtotime($inv->notifications_date) <= (int)$date_13_days? $inv->lineItems_quantity: 0);
      $qty14 = ((int)strtotime($inv->notifications_date) >= (int)$date_14days && (int)strtotime($inv->notifications_date) <= (int)$date_14_days? $inv->lineItems_quantity: 0);


      $totalsold = $inv->lineItems_quantity;

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
          'qty30' => $qty30,
          'totalsold' => $totalsold
      ]
      );
  }

}


function retrieveShipInventory_fn()
{


  // todo later (important):
  // update the sku_is table here to get the latest sku in the shipping
  // 
  // must be here, at the top
  //
  //

  $getrunning = DB::connection('mysql2')->table('vw_skus')
                ->selectRaw(
                      'vw_sku_running_qty.onhand_qty as onhand_qty,
                      vw_new_report_qty.sold_qty as sold_qty,
                      vw_skus.sku_link as onhand_sku_link,
                      vw_skus.sku as onhand_sku,
                      vw_skus.description as prodName_common'
                 )
                ->leftjoin('vw_new_report_qty', 'vw_new_report_qty.SKU1', '=', 'vw_skus.sku')
                ->leftjoin('vw_sku_running_qty', 'vw_sku_running_qty.sku', '=', 'vw_skus.sku')
                ->where('vw_skus.lyle_sku', '<>', '')
                ->where('vw_skus.lyle_sku', '<>', 'b-priority')
                ->where('vw_skus.status', '=', 'activated')
                ->get();

  DB::table('skus_balance_is')->delete(); // delete old recored             
  foreach ($getrunning as $key => $running)  // insert new recored
  {
      DB::table('skus_balance_is')->insert(
      [
          'onhand' => ($running->onhand_qty)? $running->onhand_qty:0, 
          'sold' => ($running->sold_qty)? $running->sold_qty:0, 
          'sku_link' => $running->onhand_sku_link, 
          'sku' => $running->onhand_sku, 
          'prodName_common' => $running->prodName_common 
      ]
      );
  }

  
  $date_now_front = date('n/j/Y', strtotime('now')).' 00:00:00';
  $date_now_front_num = strtotime($date_now_front);
  $date_now_front_num_unix = (int)$date_now_front_num+86400;
  $inventory_date30 = strtotime('-30 days' , strtotime($date_now_front));

  $date_1day = strtotime($date_now_front); 
  $date_2days = strtotime('-1 day' , strtotime($date_now_front)); 
  $date_3days = strtotime('-2 days' , strtotime($date_now_front)); 
  $date_4days = strtotime('-3 days' , strtotime($date_now_front)); 
  $date_5days = strtotime('-4 days' , strtotime($date_now_front)); 
  $date_6days = strtotime('-5 days' , strtotime($date_now_front)); 
  $date_7days = strtotime('-6 days' , strtotime($date_now_front)); 
  $date_8days = strtotime('-7 days' , strtotime($date_now_front)); 
  $date_9days = strtotime('-8 days' , strtotime($date_now_front)); 
  $date_10days = strtotime('-9 days' , strtotime($date_now_front)); 
  $date_11days = strtotime('-10 days' , strtotime($date_now_front)); 
  $date_12days = strtotime('-11 days' , strtotime($date_now_front)); 
  $date_13days = strtotime('-12 days' , strtotime($date_now_front)); 
  $date_14days = strtotime('-13 days' , strtotime($date_now_front)); 

  //to

  $date_now2_front = date('n/j/Y', strtotime('now')).' 23:59:59';
  $date_now2_front_num = strtotime($date_now2_front);
  $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));
  $inventory_date_30_unix = (int)$inventory_date_30-86400;
  
  $date_1_day = strtotime($date_now2_front); 
  $date_2_days = strtotime('-1 day' , strtotime($date_now2_front)); 
  $date_3_days = strtotime('-2 days' , strtotime($date_now2_front)); 
  $date_4_days = strtotime('-3 days' , strtotime($date_now2_front)); 
  $date_5_days = strtotime('-4 days' , strtotime($date_now2_front)); 
  $date_6_days = strtotime('-5 days' , strtotime($date_now2_front)); 
  $date_7_days = strtotime('-6 days' , strtotime($date_now2_front)); 
  $date_8_days = strtotime('-7 days' , strtotime($date_now2_front)); 
  $date_9_days = strtotime('-8 days' , strtotime($date_now2_front)); 
  $date_10_days = strtotime('-9 days' , strtotime($date_now2_front)); 
  $date_11_days = strtotime('-10 days' , strtotime($date_now2_front)); 
  $date_12_days = strtotime('-11 days' , strtotime($date_now2_front)); 
  $date_13_days = strtotime('-12 days' , strtotime($date_now2_front)); 
  $date_14_days = strtotime('-13 days' , strtotime($date_now2_front)); 
  
  // join the skus and new_report here

  /*
  $periods = array(
  'decade' => 315569260,
  'year' => 31556926,
  'month' => 2629744,
  'week' => 604800,
  'day' => 86400,
  'hour' => 3600,
  'minute' => 60,
  'second' => 1
  );

  to get seconds: (UNIX_TIMESTAMP(mydate)*1000)
 
 */



  $invs = DB::connection('mysql2')->table('skus')
                ->select(
                      'new_report.createdAt as createdAt',
                      'skus.lyle_sku as lyle_sku',
                      'skus.sku as sku',
                      'skus.description as description',
                      'new_report.QTY1 as qty'
                 )
                ->leftjoin('new_report', 'skus.sku', '=', 'new_report.SKU1')
                ->where(DB::raw('UNIX_TIMESTAMP(new_report.createdAt)'), '<=', $date_now_front_num_unix)
                ->where(DB::raw('UNIX_TIMESTAMP(new_report.createdAt)'), '>=', $inventory_date_30_unix)
                ->get();

  DB::table('daily_ship_is')->delete();

  foreach ($invs as $key => $inv) 
  {

      $qty30 = ((int)strtotime($inv->createdAt) >= (int)$inventory_date_30  && (int)strtotime($inv->createdAt) <= (int)$date_now2_front_num? $inv->qty: 0);     
      $qty01 = ((int)strtotime($inv->createdAt) >= (int)$date_1day && (int)strtotime($inv->createdAt) <= (int)$date_1_day? $inv->qty: 0);   
      $qty02 = ((int)strtotime($inv->createdAt) >= (int)$date_2days && (int)strtotime($inv->createdAt) <= (int)$date_2_days? $inv->qty: 0);   
      $qty03 = ((int)strtotime($inv->createdAt) >= (int)$date_3days && (int)strtotime($inv->createdAt) <= (int)$date_3_days? $inv->qty: 0);        
      $qty04 = ((int)strtotime($inv->createdAt) >= (int)$date_4days && (int)strtotime($inv->createdAt) <= (int)$date_4_days? $inv->qty: 0);        
      $qty05 = ((int)strtotime($inv->createdAt) >= (int)$date_5days && (int)strtotime($inv->createdAt) <= (int)$date_5_days? $inv->qty: 0);        
      $qty06 = ((int)strtotime($inv->createdAt) >= (int)$date_6days && (int)strtotime($inv->createdAt) <= (int)$date_6_days? $inv->qty: 0);        
      $qty07 = ((int)strtotime($inv->createdAt) >= (int)$date_7days && (int)strtotime($inv->createdAt) <= (int)$date_7_days? $inv->qty: 0); 
      $qty08 = ((int)strtotime($inv->createdAt) >= (int)$date_8days && (int)strtotime($inv->createdAt) <= (int)$date_8_days? $inv->qty: 0); 
      $qty09 = ((int)strtotime($inv->createdAt) >= (int)$date_9days && (int)strtotime($inv->createdAt) <= (int)$date_9_days? $inv->qty: 0); 
      $qty10 = ((int)strtotime($inv->createdAt) >= (int)$date_10days && (int)strtotime($inv->createdAt) <= (int)$date_10_days? $inv->qty: 0); 
      $qty11 = ((int)strtotime($inv->createdAt) >= (int)$date_11days && (int)strtotime($inv->createdAt) <= (int)$date_11_days? $inv->qty: 0); 
      $qty12 = ((int)strtotime($inv->createdAt) >= (int)$date_12days && (int)strtotime($inv->createdAt) <= (int)$date_12_days? $inv->qty: 0); 
      $qty13 = ((int)strtotime($inv->createdAt) >= (int)$date_13days && (int)strtotime($inv->createdAt) <= (int)$date_13_days? $inv->qty: 0);
      $qty14 = ((int)strtotime($inv->createdAt) >= (int)$date_14days && (int)strtotime($inv->createdAt) <= (int)$date_14_days? $inv->qty: 0);

      $totalsold = $inv->qty;

      DB::table('daily_ship_is')->insert(
      [
          'sku_link' => $inv->lyle_sku, 
          'sku' => $inv->sku, 
          'description' => $inv->description, 
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
          'qty30' => $qty30,
          'totalsold' => $totalsold
      ]
      );
  }

}
// ends here: below codes are for the automatic creation of SKU in case its not yet created yet. it will happen every each INS instance


function createShipInventoryConsolidated_fn()
{

  // for CB

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
  $date_1day = strtotime($date_now_front); 
  $date_2days = strtotime('-1 day' , strtotime($date_now_front)); 
  $date_3days = strtotime('-2 days' , strtotime($date_now_front)); 
  $date_4days = strtotime('-3 days' , strtotime($date_now_front)); 
  $date_5days = strtotime('-4 days' , strtotime($date_now_front)); 
  $date_6days = strtotime('-5 days' , strtotime($date_now_front)); 
  $date_7days = strtotime('-6 days' , strtotime($date_now_front)); 
  $date_8days = strtotime('-7 days' , strtotime($date_now_front)); 
  $date_9days = strtotime('-8 days' , strtotime($date_now_front)); 
  $date_10days = strtotime('-9 days' , strtotime($date_now_front)); 
  $date_11days = strtotime('-10 days' , strtotime($date_now_front)); 
  $date_12days = strtotime('-11 days' , strtotime($date_now_front)); 
  $date_13days = strtotime('-12 days' , strtotime($date_now_front)); 
  $date_14days = strtotime('-13 days' , strtotime($date_now_front)); 
  //to

  $date_now2_front = date('n/j/Y', strtotime('now')).' 23:59:59';
  $date_now2_front_num = strtotime($date_now_front);

  $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));
  $date_1_day = strtotime($date_now2_front); 
  $date_2_days = strtotime('-1 day' , strtotime($date_now2_front)); 
  $date_3_days = strtotime('-2 days' , strtotime($date_now2_front)); 
  $date_4_days = strtotime('-3 days' , strtotime($date_now2_front)); 
  $date_5_days = strtotime('-4 days' , strtotime($date_now2_front)); 
  $date_6_days = strtotime('-5 days' , strtotime($date_now2_front)); 
  $date_7_days = strtotime('-6 days' , strtotime($date_now2_front)); 
  $date_8_days = strtotime('-7 days' , strtotime($date_now2_front)); 
  $date_9_days = strtotime('-8 days' , strtotime($date_now2_front)); 
  $date_10_days = strtotime('-9 days' , strtotime($date_now2_front)); 
  $date_11_days = strtotime('-10 days' , strtotime($date_now2_front)); 
  $date_12_days = strtotime('-11 days' , strtotime($date_now2_front)); 
  $date_13_days = strtotime('-12 days' , strtotime($date_now2_front)); 
  $date_14_days = strtotime('-13 days' , strtotime($date_now2_front)); 

  // SELECT 
  // `item_number`,`description`,
  // SUM(`qty01`) As `qty01`,
  // SUM(`qty02`) As `qty02`,
  // SUM(`qty03`) As `qty03`,
  // SUM(`qty04`) As `qty04`,
  // SUM(`qty05`) As `qty05`,
  // SUM(`qty06`) As `qty06`,
  // SUM(`qty07`) As `qty07`,
  // SUM(`qty08`) As `qty08`,
  // SUM(`qty09`) As `qty09`,
  // SUM(`qty10`) As `qty10`,
  // SUM(`qty11`) As `qty11`,
  // SUM(`qty12`) As `qty12`,
  // SUM(`qty13`) As `qty13`,
  // SUM(`qty14`) As `qty14`,
  // SUM(`qty30`) As `qty30`,
  // SUM(`totalsold`) As `totalsold` 
  // FROM `daily_ship_con` Group By  `item_number`,`description`

  
  DB::table('daily_ship_con')->delete();

  foreach ($invs as $key => $inv) 
  {

      $qty30 = ((int)strtotime($inv->notifications_date) >= (int)$inventory_date_30  && (int)strtotime($inv->notifications_date) <= (int)$date_now2_front_num? $inv->lineItems_quantity: 0);     
      $qty01 = ((int)strtotime($inv->notifications_date) >= (int)$date_1day && (int)strtotime($inv->notifications_date) <= (int)$date_1_day? $inv->lineItems_quantity: 0);   
      $qty02 = ((int)strtotime($inv->notifications_date) >= (int)$date_2days && (int)strtotime($inv->notifications_date) <= (int)$date_2_days? $inv->lineItems_quantity: 0);   
      $qty03 = ((int)strtotime($inv->notifications_date) >= (int)$date_3days && (int)strtotime($inv->notifications_date) <= (int)$date_3_days? $inv->lineItems_quantity: 0);        
      $qty04 = ((int)strtotime($inv->notifications_date) >= (int)$date_4days && (int)strtotime($inv->notifications_date) <= (int)$date_4_days? $inv->lineItems_quantity: 0);        
      $qty05 = ((int)strtotime($inv->notifications_date) >= (int)$date_5days && (int)strtotime($inv->notifications_date) <= (int)$date_5_days? $inv->lineItems_quantity: 0);        
      $qty06 = ((int)strtotime($inv->notifications_date) >= (int)$date_6days && (int)strtotime($inv->notifications_date) <= (int)$date_6_days? $inv->lineItems_quantity: 0);        
      $qty07 = ((int)strtotime($inv->notifications_date) >= (int)$date_7days && (int)strtotime($inv->notifications_date) <= (int)$date_7_days? $inv->lineItems_quantity: 0); 
      $qty08 = ((int)strtotime($inv->notifications_date) >= (int)$date_8days && (int)strtotime($inv->notifications_date) <= (int)$date_8_days? $inv->lineItems_quantity: 0); 
      $qty09 = ((int)strtotime($inv->notifications_date) >= (int)$date_9days && (int)strtotime($inv->notifications_date) <= (int)$date_9_days? $inv->lineItems_quantity: 0); 
      $qty10 = ((int)strtotime($inv->notifications_date) >= (int)$date_10days && (int)strtotime($inv->notifications_date) <= (int)$date_10_days? $inv->lineItems_quantity: 0); 
      $qty11 = ((int)strtotime($inv->notifications_date) >= (int)$date_11days && (int)strtotime($inv->notifications_date) <= (int)$date_11_days? $inv->lineItems_quantity: 0); 
      $qty12 = ((int)strtotime($inv->notifications_date) >= (int)$date_12days && (int)strtotime($inv->notifications_date) <= (int)$date_12_days? $inv->lineItems_quantity: 0); 
      $qty13 = ((int)strtotime($inv->notifications_date) >= (int)$date_13days && (int)strtotime($inv->notifications_date) <= (int)$date_13_days? $inv->lineItems_quantity: 0);
      $qty14 = ((int)strtotime($inv->notifications_date) >= (int)$date_14days && (int)strtotime($inv->notifications_date) <= (int)$date_14_days? $inv->lineItems_quantity: 0);

      $totalsold = $inv->lineItems_quantity;

      DB::table('daily_ship_con')->insert(
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
          'qty30' => $qty30,
          'totalsold' => $totalsold
      ]
      );
  }


  // for IS
  
  $getrunning = DB::connection('mysql2')->table('vw_skus')
                ->selectRaw(
                      'vw_sku_running_qty.onhand_qty as onhand_qty,
                      vw_new_report_qty.sold_qty as sold_qty,
                      vw_skus.sku_link as onhand_sku_link,
                      vw_skus.sku as onhand_sku,
                      vw_skus.description as prodName_common'
                 )
                ->leftjoin('vw_new_report_qty', 'vw_new_report_qty.SKU1', '=', 'vw_skus.sku')
                ->leftjoin('vw_sku_running_qty', 'vw_sku_running_qty.sku', '=', 'vw_skus.sku')
                ->where('vw_skus.lyle_sku', '<>', '')
                ->where('vw_skus.lyle_sku', '<>', 'b-priority')
                ->where('vw_skus.status', '=', 'activated')
                ->get();


// SELECT 
// `sku_link`,`sku`,`description`  As `description_is`,
// SUM(`qty01`) As `qty01_is`,
// SUM(`qty02`) As `qty02_is`,
// SUM(`qty03`) As `qty03_is`,
// SUM(`qty04`) As `qty04_is`,
// SUM(`qty05`) As `qty05_is`,
// SUM(`qty06`) As `qty06_is`,
// SUM(`qty07`) As `qty07_is`,
// SUM(`qty08`) As `qty08_is`,
// SUM(`qty09`) As `qty09_is`,
// SUM(`qty10`) As `qty10_is`,
// SUM(`qty11`) As `qty11_is`,
// SUM(`qty12`) As `qty12_is`,
// SUM(`qty13`) As `qty13_is`,
// SUM(`qty14`) As `qty14_is`,
// SUM(`qty30`) As `qty30_is`,
// SUM(`totalsold`) As `totalsold_is` 
// FROM `daily_ship_is_con` Group By `sku_link`,`sku`,`description`


  // SELECT 
  // `item_number`,`description`,
  // SUM(`qty01`) As `qty01`,
  // SUM(`qty02`) As `qty02`,
  // SUM(`qty03`) As `qty03`,
  // SUM(`qty04`) As `qty04`,
  // SUM(`qty05`) As `qty05`,
  // SUM(`qty06`) As `qty06`,
  // SUM(`qty07`) As `qty07`,
  // SUM(`qty08`) As `qty08`,
  // SUM(`qty09`) As `qty09`,
  // SUM(`qty10`) As `qty10`,
  // SUM(`qty11`) As `qty11`,
  // SUM(`qty12`) As `qty12`,
  // SUM(`qty13`) As `qty13`,
  // SUM(`qty14`) As `qty14`,
  // SUM(`qty30`) As `qty30`,
  // SUM(`totalsold`) As `totalsold` 
  // FROM `daily_ship_con` Group By  `item_number`,`description`



// select max(`vw_daily_ship_is_con`.`sku`) AS `is_sku`,`skus`.`prodCode_grp` AS `prodCode_grp`,`skus`.`prodName_grp` AS `prodName_grp`,sum(`vw_daily_ship_is_con`.`qty01_is`) AS `q1_is`,sum(`vw_daily_ship_is_con`.`qty02_is`) AS `q2_is`,sum(`vw_daily_ship_is_con`.`qty03_is`) AS `q3_is`,sum(`vw_daily_ship_is_con`.`qty04_is`) AS `q4_is`,sum(`vw_daily_ship_is_con`.`qty05_is`) AS `q5_is`,sum(`vw_daily_ship_is_con`.`qty06_is`) AS `q6_is`,sum(`vw_daily_ship_is_con`.`qty07_is`) AS `q7_is`,sum(`vw_daily_ship_is_con`.`qty08_is`) AS `q8_is`,sum(`vw_daily_ship_is_con`.`qty09_is`) AS `q9_is`,sum(`vw_daily_ship_is_con`.`qty10_is`) AS `q10_is`,sum(`vw_daily_ship_is_con`.`qty11_is`) AS `q11_is`,sum(`vw_daily_ship_is_con`.`qty12_is`) AS `q12_is`,sum(`vw_daily_ship_is_con`.`qty13_is`) AS `q13_is`,sum(`vw_daily_ship_is_con`.`qty14_is`) AS `q14_is`,sum(`vw_daily_ship_is_con`.`qty30_is`) AS `q30_is`,sum(`vw_daily_ship_con`.`qty01`) AS `q1`,sum(`vw_daily_ship_con`.`qty02`) AS `q2`,sum(`vw_daily_ship_con`.`qty03`) AS `q3`,sum(`vw_daily_ship_con`.`qty04`) AS `q4`,sum(`vw_daily_ship_con`.`qty05`) AS `q5`,sum(`vw_daily_ship_con`.`qty06`) AS `q6`,sum(`vw_daily_ship_con`.`qty07`) AS `q7`,sum(`vw_daily_ship_con`.`qty08`) AS `q8`,sum(`vw_daily_ship_con`.`qty09`) AS `q9`,sum(`vw_daily_ship_con`.`qty10`) AS `q10`,sum(`vw_daily_ship_con`.`qty11`) AS `q11`,sum(`vw_daily_ship_con`.`qty12`) AS `q12`,sum(`vw_daily_ship_con`.`qty13`) AS `q13`,sum(`vw_daily_ship_con`.`qty14`) AS `q14`,sum(`vw_daily_ship_con`.`qty30`) AS `q30`,sum(`skus_balance_is_con`.`onhand`) AS `onhand`,sum(`skus_balance_is_con`.`sold`) AS `sold`, sum(`vw_daily_ship_con`.`totalsold`) As `cb_totalsold` from (((`skus` left join `vw_daily_ship_is_con` on((`skus`.`prodCode` = `vw_daily_ship_is_con`.`sku`))) left join `vw_daily_ship_con` on((`skus`.`prodCode` = `vw_daily_ship_con`.`item_number`))) left join `skus_balance_is_con` on((`skus`.`prodCode` = `skus_balance_is_con`.`sku`))) group by `skus`.`prodCode_grp`,`skus`.`prodName_grp`

              

  DB::table('skus_balance_is_con')->delete(); // delete old recored             
  foreach ($getrunning as $key => $running)  // insert new recored
  {
      DB::table('skus_balance_is_con')->insert(
      [
          'onhand' => ($running->onhand_qty)? $running->onhand_qty:0, 
          'sold' => ($running->sold_qty)? $running->sold_qty:0, 
          'sku_link' => $running->onhand_sku_link, 
          'sku' => $running->onhand_sku, 
          'prodName_common' => $running->prodName_common 
      ]
      );
  }

  
  $date_now_front = date('n/j/Y', strtotime('now')).' 00:00:00';
  $date_now_front_num = strtotime($date_now_front);
  $date_now_front_num_unix = (int)$date_now_front_num+86400;
  $inventory_date30 = strtotime('-30 days' , strtotime($date_now_front));

  $date_1day = strtotime($date_now_front); 
  $date_2days = strtotime('-1 day' , strtotime($date_now_front)); 
  $date_3days = strtotime('-2 days' , strtotime($date_now_front)); 
  $date_4days = strtotime('-3 days' , strtotime($date_now_front)); 
  $date_5days = strtotime('-4 days' , strtotime($date_now_front)); 
  $date_6days = strtotime('-5 days' , strtotime($date_now_front)); 
  $date_7days = strtotime('-6 days' , strtotime($date_now_front)); 
  $date_8days = strtotime('-7 days' , strtotime($date_now_front)); 
  $date_9days = strtotime('-8 days' , strtotime($date_now_front)); 
  $date_10days = strtotime('-9 days' , strtotime($date_now_front)); 
  $date_11days = strtotime('-10 days' , strtotime($date_now_front)); 
  $date_12days = strtotime('-11 days' , strtotime($date_now_front)); 
  $date_13days = strtotime('-12 days' , strtotime($date_now_front)); 
  $date_14days = strtotime('-13 days' , strtotime($date_now_front)); 

  //to

  $date_now2_front = date('n/j/Y', strtotime('now')).' 23:59:59';
  $date_now2_front_num = strtotime($date_now2_front);
  $inventory_date_30 = strtotime('-30 days' , strtotime($date_now2_front));
  $inventory_date_30_unix = (int)$inventory_date_30-86400;
  
  $date_1_day = strtotime($date_now2_front); 
  $date_2_days = strtotime('-1 day' , strtotime($date_now2_front)); 
  $date_3_days = strtotime('-2 days' , strtotime($date_now2_front)); 
  $date_4_days = strtotime('-3 days' , strtotime($date_now2_front)); 
  $date_5_days = strtotime('-4 days' , strtotime($date_now2_front)); 
  $date_6_days = strtotime('-5 days' , strtotime($date_now2_front)); 
  $date_7_days = strtotime('-6 days' , strtotime($date_now2_front)); 
  $date_8_days = strtotime('-7 days' , strtotime($date_now2_front)); 
  $date_9_days = strtotime('-8 days' , strtotime($date_now2_front)); 
  $date_10_days = strtotime('-9 days' , strtotime($date_now2_front)); 
  $date_11_days = strtotime('-10 days' , strtotime($date_now2_front)); 
  $date_12_days = strtotime('-11 days' , strtotime($date_now2_front)); 
  $date_13_days = strtotime('-12 days' , strtotime($date_now2_front)); 
  $date_14_days = strtotime('-13 days' , strtotime($date_now2_front)); 
  // join the skus and new_report here

  /*
  $periods = array(
  'decade' => 315569260,
  'year' => 31556926,
  'month' => 2629744,
  'week' => 604800,
  'day' => 86400,
  'hour' => 3600,
  'minute' => 60,
  'second' => 1
  );

  to get seconds: (UNIX_TIMESTAMP(mydate)*1000)
 
 */

  $invs = DB::connection('mysql2')->table('skus')
                ->select(
                      'new_report.createdAt as createdAt',
                      'skus.lyle_sku as lyle_sku',
                      'skus.sku as sku',
                      'skus.description as description',
                      'new_report.QTY1 as qty'
                 )
                ->leftjoin('new_report', 'skus.sku', '=', 'new_report.SKU1')
                ->where(DB::raw('UNIX_TIMESTAMP(new_report.createdAt)'), '<=', $date_now_front_num_unix)
                ->where(DB::raw('UNIX_TIMESTAMP(new_report.createdAt)'), '>=', $inventory_date_30_unix)
                ->get();


  DB::table('daily_ship_is_con')->delete();

  foreach ($invs as $key => $inv) 
  {

      $qty30 = ((int)strtotime($inv->createdAt) >= (int)$inventory_date_30  && (int)strtotime($inv->createdAt) <= (int)$date_now2_front_num? $inv->qty: 0);     
      $qty01 = ((int)strtotime($inv->createdAt) >= (int)$date_1day && (int)strtotime($inv->createdAt) <= (int)$date_1_day? $inv->qty: 0);   
      $qty02 = ((int)strtotime($inv->createdAt) >= (int)$date_2days && (int)strtotime($inv->createdAt) <= (int)$date_2_days? $inv->qty: 0);   
      $qty03 = ((int)strtotime($inv->createdAt) >= (int)$date_3days && (int)strtotime($inv->createdAt) <= (int)$date_3_days? $inv->qty: 0);        
      $qty04 = ((int)strtotime($inv->createdAt) >= (int)$date_4days && (int)strtotime($inv->createdAt) <= (int)$date_4_days? $inv->qty: 0);        
      $qty05 = ((int)strtotime($inv->createdAt) >= (int)$date_5days && (int)strtotime($inv->createdAt) <= (int)$date_5_days? $inv->qty: 0);        
      $qty06 = ((int)strtotime($inv->createdAt) >= (int)$date_6days && (int)strtotime($inv->createdAt) <= (int)$date_6_days? $inv->qty: 0);        
      $qty07 = ((int)strtotime($inv->createdAt) >= (int)$date_7days && (int)strtotime($inv->createdAt) <= (int)$date_7_days? $inv->qty: 0); 
      $qty08 = ((int)strtotime($inv->createdAt) >= (int)$date_8days && (int)strtotime($inv->createdAt) <= (int)$date_8_days? $inv->qty: 0); 
      $qty09 = ((int)strtotime($inv->createdAt) >= (int)$date_9days && (int)strtotime($inv->createdAt) <= (int)$date_9_days? $inv->qty: 0); 
      $qty10 = ((int)strtotime($inv->createdAt) >= (int)$date_10days && (int)strtotime($inv->createdAt) <= (int)$date_10_days? $inv->qty: 0); 
      $qty11 = ((int)strtotime($inv->createdAt) >= (int)$date_11days && (int)strtotime($inv->createdAt) <= (int)$date_11_days? $inv->qty: 0); 
      $qty12 = ((int)strtotime($inv->createdAt) >= (int)$date_12days && (int)strtotime($inv->createdAt) <= (int)$date_12_days? $inv->qty: 0); 
      $qty13 = ((int)strtotime($inv->createdAt) >= (int)$date_13days && (int)strtotime($inv->createdAt) <= (int)$date_13_days? $inv->qty: 0);
      $qty14 = ((int)strtotime($inv->createdAt) >= (int)$date_14days && (int)strtotime($inv->createdAt) <= (int)$date_14_days? $inv->qty: 0);


      $totalsold = $inv->qty;

      DB::table('daily_ship_is_con')->insert(
      [
          'sku_link' => $inv->lyle_sku, 
          'sku' => $inv->sku, 
          'description' => $inv->description, 
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
          'qty30' => $qty30,
          'totalsold' => $totalsold
      ]
      );
  }

}



// starts here: below codes are for maropost posting of email and other relevant adta
class MP {
  static $auth_token  = "Blft0gQ-XXccABwdFdDdABKf7wqFE3HXfQgwlLtE3gIGgo5YdARhMg";
  static $url_api   = "http://api.maropost.com/accounts/1044/";
  function request($action, $endpoint, $dataArray) {
    $url = self::$url_api . $endpoint . ".json"; 
      $ch = curl_init();
      $dataArray['auth_token'] = self::$auth_token;
      $json = json_encode($dataArray);
      //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
      curl_setopt($ch, CURLOPT_URL, $url);
      switch($action){
              case "POST":
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
              curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
              break;
          case "GET":
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
              curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
              break;
          case "PUT":
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
              curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
              break;
          case "DELETE":
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
              curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
              break;
          default:
              break;
      }
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json','Accept: application/json'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      echo $output = curl_exec($ch);
      curl_close($ch);
    }
}




function maroPost_fn($receipt)
{

  $maro = DB::table('notifications')
        ->select(
              'notifications.receipt', 
              'lineItems.itemNo', 
              'lineItems.productTitle', 
              'shipping.email', 
              'shipping.firstName', 
              'shipping.lastName', 
              'shipping_address.address1', 
              'shipping_address.address2', 
              'shipping_address.city', 
              'shipping_address.state', 
              'shipping_address.country', 
              'shipping_address.postalCode', 
              'lineItems.downloadUrl', 
              'notifications.affiliate', 
              'notifications.vendor'
              )
        ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
        ->leftjoin('shipping', 'shipping.lnkid', '=', 'notifications.id')
        ->leftjoin('shipping_address', 'shipping_address.lnkid', '=', 'notifications.id')
        ->where('notifications.receipt', '=', $receipt)
        ->groupby('notifications.receipt', 
              'lineItems.itemNo', 
              'lineItems.productTitle', 
              'shipping.email', 
              'shipping.firstName', 
              'shipping.lastName', 
              'shipping_address.address1', 
              'shipping_address.address2', 
              'shipping_address.city', 
              'shipping_address.state', 
              'shipping_address.country', 
              'shipping_address.postalCode', 
              'lineItems.downloadUrl', 
              'notifications.affiliate', 
              'notifications.vendor'
              )
        ->get();
  $mp = new MP;
  foreach ($maro as $key => $m) 
  {

    $tag = "";  
    if (strpos($m->itemNo, 'cptbook') !== false) {
        $tag = 'cptbook';
        $welcomeid = '6863';
    } else if (strpos($m->itemNo, 'sgfl') !== false) {
        $tag = 'sgfl';
        $welcomeid = '6869';
    } else if (strpos($m->itemNo, 'swt') !== false) {
        $tag = 'swt';
        $welcomeid = '6862';
    } else if (strpos($m->itemNo, 'tclsr') !== false) {
        $tag = 'tclsr';
        $welcomeid = '6861';
    } else if (strpos($m->itemNo, 'cpslbag') !== false) {
        $tag = 'cpslbag';
        $welcomeid = '6864';
    } else if (strpos($m->itemNo, 'cpusbat') !== false) {
        $tag = 'cpusbat';
        $welcomeid = '6857';
    } else if (strpos($m->itemNo, 'backpk') !== false) {
        $tag = 'backpk';
        $welcomeid = '6865';
    } else if (strpos($m->itemNo, 'gbgknf') !== false) {
        $tag = 'gbgknf';
        $welcomeid = '6866';
    } else if (strpos($m->itemNo, 'stflpkn') !== false) {
        $tag = 'stflpkn';
        $welcomeid = '6867';
    } else if (strpos($m->itemNo, 'extbpk') !== false) {
        $tag = 'extbpk';
        $welcomeid = '6868';
    }
   
    $first_name=$m->firstName;
    
    $last_name=$m->lastName;
    $address1=$m->address1;
    $address2=$m->address2;
    $city=$m->city;
    $state=$m->state;
    $country=$m->country;
    $postalCode=$m->postalCode;
    $productTitle=$m->productTitle;

    $email=$m->email;
    $page="";
    $affiliate=(empty($m->affiliate)? "":$m->affiliate);
    $updatedTimeUtc = gmdate("Y-m-d\\TH:i:s\\Z");


    // $contactData= ["contact"=>["email"=>$email,"first_name"=>$first_name,"custom_field"=>["opt_source_drm"=>$page,"affiliate"=>$affiliate,"updated" => $updatedTimeUtc],"add_tags"=>[$tag]]];
    // $newcontact = $mp->request('POST','lists/8/contacts',  $contactData); // 18 is he original value 

    $contactData= ["contact"=>["email"=>$email,"first_name"=>$first_name,"last_name"=>$last_name,"custom_field"=>["opt_source_drm"=>$page,"affiliate"=>$affiliate,"updated" => $updatedTimeUtc, "product" => $productTitle, "address_1" => $address1, "address_2" => $address2, "city" => $city,
                "country" => $country, "zip_code" => $postalCode, "state" => $state],"add_tags"=>[$tag]]];   
    $mp->request('POST','lists/8/contacts',  $contactData); // 18 is he original value 

    DB::table('notifications')
            ->where('receipt', $receipt)
            ->update(['posted' => 1]);

     

     /*Sending Campaign */ 
    $contactData1= ["email"=>["campaign_id"=>$welcomeid, "contact"=>["email"=>$email, "custom_field"=>["opt_source_drm"=>$page,"affiliate"=>$affliate,"updated" => $updatedTimeUtc]]]];
    $mp->request('POST','emails/deliver',$contactData1);

  }  
}

// ends here: below codes are for maropost posting of email and other relevant adta
