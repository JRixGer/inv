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


        updateImportedProd_fn();

        $daily_ship = Inventory::sortable()->paginate(17);

       
        return view('shipping.inventory', ['daily_ship' => $daily_ship]);

    }
}
