<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\InventoryIS;
use App\InventoryConsolidated;
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

        updateProd_fn();
        updateInventory_fn();

        $daily_ship = Inventory::sortable()->orderby('prodName_common')->paginate(17);

        return view('shipping.inventory', ['daily_ship' => $daily_ship]);

    }

   public function list_is()
    {


        updateProd_fn();
        updateInventory_fn();
        retrieveShipInventory_fn();

        $daily_ship = InventoryIS::sortable()->where('prodName_common','<>','')->orderby('prodName_common')->paginate(17);

        return view('shipping.inventory_is', ['daily_ship' => $daily_ship]);

    }

   public function list_consolidated()
    {

        updateProd_fn();
        updateInventory_fn();
        createShipInventoryConsolidated_fn();

        $daily_ship_con = InventoryConsolidated::where('prodCode_grp','<>','1')->orderby('prodName_grp')->paginate(17);

        return view('shipping.inventory_consolidated', ['daily_ship' => $daily_ship_con]);

    }
}
