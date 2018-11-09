<?php

namespace App\Http\Controllers;

use App\Sku;
//use App\SkuRunningQty;
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

    public function running()
    {
        $running = DB::connection('mysql2')->table('sku_running_qty')
        ->select('*')
        ->paginate(17);
        
        dd($running);

        //return view('shipping.sku', compact('skus')); 
 

    }


    public function list()
    {
        
        updateProd_fn();

        // $skus = DB::connection('mysql')->table('skus')
        // ->select('*')
        // ->where('prodCode', '<>', '1')
        // ->orderby('prodName')
        // ->paginate(17);
        // return view('shipping.sku', compact('skus'));


        //return view('shipping.sku')->with('skus', Sku::all()->where('prodCode', '<>', '1')->sortBy("prodName"));
        //return view('shipping.sku_vue'); // for vuejs

        $skus = Sku::sortable()->where('prodCode', '<>', '1')->paginate(17);
        return view('shipping.sku', ['skus' => $skus]);

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
            'pcode_grp' => 'required',
            'pname_grp' => 'required'
        ]);

        $data = $request->all();
        $id = $data['id'];  
        $pcode = $data['pcode'];        
        $pname_grp = $data['pname_grp'];
        $pcode_grp = $data['pcode_grp'];

        $sku = Sku::find($id);

        $sku->prodName_grp = $pname_grp; 
        $sku->prodCode_grp = $pcode_grp; 

        $sku->save();
        //Session::flash('success','You successfully updated a category');
        //return redirect()->route('categories');

    }



}
