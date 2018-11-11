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


        updateInventory_fn();

        $daily_ship = Inventory::sortable()->orderby('prodName_common')->paginate(17);

        return view('shipping.inventory', ['daily_ship' => $daily_ship]);

    }

   public function list_is()
    {


        $daily_ship = Inventory::sortable()->orderby('prodName_common')->paginate(17);

        return view('shipping.inventory_is', ['daily_ship' => $daily_ship]);

    }

   public function list_consolidated()
    {


        $daily_ship = Inventory::sortable()->orderby('prodName_common')->paginate(17);

        return view('shipping.inventory_consolidated', ['daily_ship' => $daily_ship]);

    }
}
