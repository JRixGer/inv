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
        
        return view('shipping.sku')->with('skus', Sku::all());

    }


}
