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
        //return view('shipping.sku_vue'); // for vuejs

    }

    // below are for vuejs
    public function mount()
    {
        
 
        $skus = Sku::get();
        return response()->json([
            'skus'    => $skus,
        ], 200);        

    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'pqty' => 'required|numeric'
        ]);

        $data = $request->all();
        $id = $data['id'];  
        $pcode = $data['pcode'];        
        $pqty = $data['pqty'];        

        $sku = Sku::find($id);
        $sku->prodQty = $pqty; 
        $sku->save();
        //Session::flash('success','You successfully updated a category');
        //return redirect()->route('categories');

    }



}
