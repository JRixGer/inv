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

// Here is how you do in Eloquent
// $users = User::whereIn('id', array(1, 2, 3))->get();
// And if you are using Query builder then :
// $users = DB::table('users')->whereIn('id', array(1, 2, 3))->get();
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

// ends here: below codes are for the automatic creation of SKU in case its not yet created yet. it will happen every each INS instance




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
              'notifications.dt', 
              'notifications.receipt', 
              'lineItems.itemNo', 
              'billing.email',
              'billing.firstName', 
              'billing.lastName', 
              'lineItems.downloadUrl', 
              'notifications.affiliate', 
              'notifications.vendor'
              )
        ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
        ->leftjoin('billing', 'billing.lnkid', '=', 'notifications.id')
        ->where('notifications.receipt', '=', $receipt)
        ->groupby('notifications.dt', 
              'notifications.receipt', 
              'lineItems.itemNo', 
              'billing.email',
              'billing.firstName', 
              'billing.lastName', 
              'lineItems.downloadUrl', 
              'notifications.affiliate', 
              'notifications.vendor'
              )
        ->get();
  $mp = new MP;
  foreach ($maro as $key => $m) 
  {

    $first_name=$m->firstName;
    $email=$m->email;
    $page="";
    $affiliate=(empty($m->affiliate)? "":$m->affiliate);
    $updatedTimeUtc = gmdate("Y-m-d\\TH:i:s\\Z");

    $contactData= ["contact"=>["email"=>$email,"first_name"=>$first_name,"custom_field"=>["opt_source_drm"=>$page,"affiliate"=>$affiliate,"updated" => $updatedTimeUtc],"add_tags"=>[$m->itemNo, "clickbank"],"subscribe"=>true,"remove_from_dnm"=>true]];
    $newcontact = $mp->request('POST','lists/8/contacts',  $contactData); // 18 is he original value 

    DB::table('notifications')
            ->where('receipt', $receipt)
            ->update(['posted' => 1]);



    file_put_contents('ins_maro.txt', ">>>> result: ".print_r($contactData , true), FILE_APPEND);


  }  
}

// ends here: below codes are for maropost posting of email and other relevant adta
