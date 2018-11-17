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
        

        $search = $request->all();
        $search_key = $search['search_key'];  

        $skus = DB::table('skus')
        ->select('*')
        ->orWhere('prodCode', 'LIKE', '%'.$search_key.'%')
        ->orWhere('prodName', 'LIKE', '%'.$search_key.'%')
        ->orWhere('prodCode_grp', 'LIKE', '%'.$search_key.'%')
        ->orWhere('prodName_grp', 'LIKE', '%'.$search_key.'%')
        ->orWhere('prodName_common', 'LIKE', '%'.$search_key.'%')
        ->orderby('prodName')->get();


        $data['result'] = "<div><span class=\"text-right\"><i class=\"fa fa-window-close float-right\" style=\"color:#f4a605; margin-bottom:-20px\" id=\"search_result\" onclick=\"hide_result()\"></i></span>
              <table class=\"table table-sm\" style=\"background-color: #f8fded\">
              <thead>
                <tr>
                  <th scope=\"col\">CB SKU Raw</th>
                  <th scope=\"col\">CB SKU Grouping</th>
                  <th scope=\"col\">Description Raw</th>
                  <th scope=\"col\">Description Grouping</th>
                  <th scope=\"col\">Description (from shipping)</th>
                  <th scope=\"col\" colspan=\"2\">ACTION</th>
                 </tr>
              </thead>
              <tbody>";
                    
                if($skus->count() > 0)
                {
                    foreach($skus as $sku)
                    {

                        $data['result'] .= "<tr>
                        <td>
                          ". $sku->prodCode ."
                        </td>
                        <td>
                          ". $sku->prodCode_grp ."
                        </td>                                
                        <td>
                          ". $sku->prodName ."
                        </td>
                        <td>
                          ". $sku->prodName_grp ."
                        </td>
                        <td>
                          ". $sku->prodName_common ."
                        </td>
                        <td>
                          <a class=\"btn btn-sm btn-info\" onclick=\"load_sku('".$sku->id."', '".$sku->prodCode."','".$sku->prodName."', '".$sku->prodCode_grp."','".$sku->prodName_grp."','".$sku->prodName_common."')\"><i class=\"fa fa-edit\"></i></a>
                        </td>
                        <td>
                          <a class=\"btn btn-sm btn-warning\"><i class=\"fa fa-trash-alt\"></i></a>
                        </td>
                     </tr>";
                    }
                }        
                else
                {
                    $data['result'] .= "<tr>
                      <th colspan=\"7\" align=\"center\" style=\"color:RED\">No Records</th>
                    </tr>";
                }
            $data['result'] .= "    
              </tbody>
            </table><div>";
        
        echo json_encode($data);
        exit;
        
        // return response()->json([
        //     'skus'    => $skus,
        // ], 200);        

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
            'cbpcode_grp' => 'required',
            'ispcode_grp' => 'required',
            'pname_grp' => 'required'
        ]);

        $data = $request->all();
        $id = $data['id'];  
        $pcode = $data['pcode'];        
        $cbpcode_grp = $data['cbpcode_grp'];
        $ispcode_grp = $data['ispcode_grp'];
        $pname_grp = $data['pname_grp'];
        $pcode_common = $data['pcode_common'];

        $sku = Sku::find($id);

        $sku->prodName_grp = $pname_grp; 
        $sku->prodName_common = $pcode_common; 
        $sku->prodCode_grp = $cbpcode_grp; 
        $sku->prodCode_other = $ispcode_grp; 

        $sku->save();
        //updateProd_fn();
        //Session::flash('success','You successfully updated a category');
        //return redirect()->route('categories');

    }

    public function temp()
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

        $check_in_items = DB::table('temp')
          ->select('item', 'name')
          ->whereNotIn('item', $prodCodes)
          ->groupby('item', 'name' )
          ->get();


        foreach ($check_in_items as $key => $i) 
        {
            DB::table('skus')->insert(
            [
                'prodCode' => $i->item, 
                'prodName' => $i->name, 
                'prodQty' => 0, 
                'prodType' => 'IS',
                'prodCode_grp' => $i->item, 
                'prodName_grp' => $i->name,
                'prodName_common' => ''
            ]
            );

        }    


    }



}
