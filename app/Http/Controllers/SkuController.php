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


    public function update_product()
    {
        
        updateProd_fn();
 
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
        $skus = Sku::sortable()->where('prodCode', '<>', '1')->paginate(17);
        return view('shipping.sku', ['skus' => $skus]);

        //return view('shipping.sku')->with('skus', Sku::all()->where('prodCode', '<>', '1')->sortBy("prodName"));
        //return view('shipping.sku_vue'); // for vuejs
    }


    // Route::any ( '/search', function () {
    //     $q = Input::get ( 'q' );
    //     if($q != ""){
    //     $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
    //     $pagination = $user->appends ( array (
    //                 'q' => Input::get ( 'q' ) 
    //         ) );
    //     if (count ( $user ) > 0)
    //         return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    //     }
    //         return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
    // } );

    public function search(Request $request)
    {
        
 
        $data = $request->all();
        $search_key = $data['search_key'];  

        $skus = Sku::get();
        return response()->json([
            'skus'    => $skus,
        ], 200);        

    }





    // below are for vuejs
    public function mount(Request $request)
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
        $pcode_common = $data['pcode_common'];

        $sku = Sku::find($id);

        $sku->prodName_grp = $pname_grp; 
        $sku->prodName_common = $pcode_common; 
        $sku->prodCode_grp = $pcode_grp; 

        $sku->save();
        //Session::flash('success','You successfully updated a category');
        //return redirect()->route('categories');

    }



}
