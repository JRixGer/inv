<?php

namespace App\Http\Controllers;

use App\Sku;
use Illuminate\Http\Request;
use DB;

class SkuController extends Controller
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

        return view('shipping.sku')->with('skus', Sku::all());
        //return view('shipping.sku'); // for vueje

    }

    // below are for vuejs
    public function mount()
    {
        
 
        $skus = Sku::get();
        return response()->json([
            'skus'    => $skus,
        ], 200);        

    }


}
