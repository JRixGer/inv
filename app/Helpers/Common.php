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
            'prodType' => $i->lineItemType 
        ]
        );

    }         


// Here is how you do in Eloquent

// $users = User::whereIn('id', array(1, 2, 3))->get();
// And if you are using Query builder then :

// $users = DB::table('users')->whereIn('id', array(1, 2, 3))->get();


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
    $page=$m->downloadUrl;
    $affiliate=(empty($m->affiliate)? 'vendor:'.$m->vendor:'affiliate:'.$m->affiliate);
    $updatedTimeUtc = gmdate("Y-m-d\\TH:i:s\\Z");

    $contactData= ["contact"=>["email"=>$email,"first_name"=>$first_name,"custom_field"=>["opt_source_drm"=>$page,"affiliate"=>$affiliate,"updated" => $updatedTimeUtc],"add_tags"=>[$m->itemNo, "clickbank"],"subscribe"=>true,"remove_from_dnm"=>true]];
    $newcontact = $mp->request('POST','lists/14/contacts',  $contactData); // 18 is he original value 

    DB::table('notifications')
            ->where('receipt', $receipt)
            ->update(['posted' => 1]);


    if($newcontact)
      file_put_contents('ins_maro.txt', ">>>>ok result: ".print_r($newcontact , true), FILE_APPEND);
    else
      file_put_contents('ins_maro.txt', ">>>>error result: ".print_r($newcontact , true), FILE_APPEND);


  }  
}

// ends here: below codes are for maropost posting of email and other relevant adta
