<?php

// global functions here :)

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


