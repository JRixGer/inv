<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Members;

class ReportsController extends Controller
{


  public function options()
  {
    return view('reports.datamining'); // laravel way
  }

  public function datamine(Request $request)
  {

    $para = $request->toArray() ;
    
    $AllMembers = 0;
    $MembersYesterday = 0;
    $MembersLast7Days = 0;


    if($para["repOption"] == "1")
    {
        $searchStartDt = date('Y-m-d',strtotime("now")-604800);
        $searchEndDt = date('Y-m-d',strtotime("now"));
        $searchDt = date('Y-m-d',strtotime("now")-86400);
    
        $AllMembers = Members::count();
        $MembersYesterday = Members::where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '=', $searchDt)->count();
        $MembersLast7Days = Members::where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '>=', $searchStartDt)->where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '<=', $searchEndDt)->count();
  
    }

    return json_encode(['members'=>$AllMembers, 'membersYesterday'=>$MembersYesterday, 'membersLast7Days'=>$MembersLast7Days]);
    
  }

 }
