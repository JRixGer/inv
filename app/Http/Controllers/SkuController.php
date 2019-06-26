<?php

namespace App\Http\Controllers;

use App\Sku;
//use App\SkuRunningQty;
use Illuminate\Http\Request;
use DB;
use Session;

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

        $input = \Request::all();
        $n = 25;
        if(!empty(Session::get('show_n')))
            $n = Session::get('show_n');

        if(isset($input['n']))
        {
           $n = $input['n'];
           if($n == 'All')
           {
                $skus = DB::table('skus')
                ->select('*')
                ->Where('prodCode', '<>', '1')
                ->orderby('prodName_grp')->get();

                $n = $skus->count();
           }
        }

        Session::put('show_n', $n);

        updateProd_fn();

        $skus = Sku::sortable()->where('prodCode', '<>', '1')->paginate($n);
        return view('shipping.sku', ['skus' => $skus]); // laravel way
        //return view('shipping.sku_vue'); // for vuejs way
    }

    public function mapping()
    {

        $input = \Request::all();
        $n = 25;
        if(!empty(Session::get('show_n')))
            $n = Session::get('show_n');

        if(isset($input['n']))
        {
           $n = $input['n'];
           if($n == 'All')
           {
                $skus = DB::table('skus')
                ->select('*')
                ->Where('prodCode', '<>', '1')
                ->orderby('prodName_grp')->get();

                $n = $skus->count();
           }
        }

        Session::put('show_n', $n);

        updateProd_fn();

        $skus = Sku::sortable()->where('prodCode', '<>', '1')->paginate($n);
        return view('shipping.sku', ['skus' => $skus]); // laravel way
        //return view('shipping.sku_vue'); // for vuejs way
    }

    public function goals()
    {

        $data = DB::select('select * from sku_ho_goal order by offer_id, type, goal_id');


        return view('shipping.sku_goals', compact('data')); // laravel way
        //return view('shipping.sku_vue'); // for vuejs way
    }

    public function save_goals(Request $request)
    {

        foreach ($request->sku as $key => $row) {
            if( $request->record_id[$key] === 'NA' ){
                $result = DB::table('sku_ho_goal')->insert([
                        'prodCode' => $row, 
                        'goal_id' => $request->goal_id[$key],
                        'offer_id' => $request->offer_id[$key],
                        'type' => $request->type[$key]
                    ]);
            }else{
                $result = DB::table('sku_ho_goal')
                    ->where('id', $request->record_id[$key])
                    ->update([
                        'prodCode' => $row, 
                        'goal_id' => $request->goal_id[$key],
                        'offer_id' => $request->offer_id[$key],
                        'type' => $request->type[$key]
                    ]);
            }
        }

        return json_encode(['status'=>$result]);
    }

    public function tbl_goals()
    {
        $data = DB::select('select * from sku_ho_goal order by offer_id, type, goal_id');
        return view('shipping.sku_goals_table', compact('data'));
    }

    public function delete_goals(Request $request)
    {
        $result = DB::table('sku_ho_goal')->where('id',$request->id)->delete();
        return json_encode(['status'=>true]);
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
        ->orWhere('campaign_id', 'LIKE', '%'.$search_key.'%')
        ->orWhere('tag_name', 'LIKE', '%'.$search_key.'%')
        ->orderby('prodName')->get();


        $data['result'] = "<div><span class=\"text-right\"><i class=\"fa fa-window-close float-right\" style=\"color:#f4a605; margin-bottom:-20px\" id=\"search_result\" onclick=\"hide_result()\"></i></span>
              <table class=\"table table-sm\" style=\"background-color: #f8fded\">
              <thead>
                <tr>
                  <th scope=\"col\">CB SKU Raw</th>
                  <th scope=\"col\">CB SKU Grouping</th>
                  <th scope=\"col\">IS SKU Grouping</th>
                  <th scope=\"col\">Description Raw</th>
                  <th scope=\"col\">Description Grouping</th>
                  <th scope=\"col\">Description (from shipping)</th>
                  <th scope=\"col\">Campaign ID</th>
                  <th scope=\"col\">Tag Name</th>
                  <th scope=\"col\">Goal ID</th>
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
                          ". $sku->prodCode_other ."
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
                          ". $sku->campaign_id ."
                        </td>
                        <td>
                        ". $sku->tag_name ."
                      </td>
                        <td>
                        ". $sku->goal_id ."
                      </td>
                        <td>
                          <a class=\"btn btn-sm btn-info\" onclick=\"load_sku('".$sku->id."', '".$sku->prodCode."', '".$sku->prodCode_grp."', '".$sku->prodCode_other."','".$sku->prodName."', '".$sku->prodCode_grp."','".$sku->prodName_common."','".$sku->campaign_id."','".$sku->tag_name."','".$sku->goal_id."')\"><i class=\"fa fa-edit\"></i></a>
                         
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
        
         $skus = DB::table('skus')
        ->select('*')
        ->Where('prodCode', '<>', '1')
        ->orderby('prodName_grp')->get();

        //$skus = Sku::all()->where('prodCode', '<>', '1')->get();
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
        $pname_common = $data['pname_common'];
        $campaign_id = $data['campaign_id'];
        $tag_name= $data['tag_name'];
        $goal_id= $data['goal_id'];


        $sku = Sku::find($id);

        $sku->prodName_grp = $pname_grp; 
        $sku->prodCode_grp = $cbpcode_grp; 
        $sku->prodCode_other = $ispcode_grp; 
        $sku->prodName_common = $pname_common;
        $sku->campaign_id = $campaign_id; 
        $sku->tag_name = $tag_name; 
        $sku->goal_id = $goal_id;
 
        $sku->save();
        //updateProd_fn();
        //Session::flash('success','You successfully updated a category');
        //return redirect()->route('categories');

    }



    public function update_v(Request $request, $id)
    {

        $this->validate($request, [
            'cbpcode_grp' => 'required',
            'ispcode_grp' => 'required',
            'pname_grp' => 'required'
        ]);

        $data = $request->all();
        
        $cbpcode_grp = $data['cbpcode_grp'];
        $ispcode_grp = $data['ispcode_grp'];
        $pname_grp = $data['pname_grp'];
        $pname_common = $data['pname_common'];
        $campaign_id = $data['campaign_id'];
        $tag_name = $data['tag_name'];

        $sku = Sku::find($id);

        $sku->prodName_grp = $pname_grp; 
        $sku->prodCode_grp = $cbpcode_grp; 
        $sku->prodCode_other = $ispcode_grp; 
        $sku->prodName_common = $pname_common; 
        $sku->campaign_id = $campaign_id; 
        $sku->tag_name = $tag_name; 
        
        $sku->save();

        return response()->json([
            'message' => 'Product updated successfully!'
        ], 200);

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
                'prodName_common' => '',
                'campaign_id' => '',
                'tag_name' => ''
            ]
            );

        }    


    }



}
