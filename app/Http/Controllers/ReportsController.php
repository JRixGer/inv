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

    $transtypes = DB::select(" SELECT `transactionType` 
                              FROM `notifications` 
                              LEFT JOIN `lineItems` on `notifications`.`id`= `lineItems`.`lnkid` 
                              WHERE `lineItems`.`itemNo` LIKE '%pwcp%' 
                              AND  `notifications`.`transactionType` <> 'TEST_BILL' 
                              AND  `notifications`.`transactionType` <> 'TEST_SALE' 
                              GROUP by `transactionType`"
                            );            
    
    return view('reports.datamining',['transtypes' => $transtypes]); // laravel way
  }

  public function datamine(Request $request)
  {

    $para = $request->toArray();
    
    $AllMembers = 0;
    $MembersYesterday = 0;
    $MembersLast7Days = 0;

    $searchStartDt = date('Y-m-d',strtotime("now")-604800);
    $searchEndDt = date('Y-m-d',strtotime("now"));
    $searchDt = date('Y-m-d',strtotime("now")-86400);

    $searchStartDtRange =  date('Y-m-d',strtotime($para['fromDt']));
    $searchEndDtRange =  date('Y-m-d',strtotime($para['toDt']));  

    $searchTransType = $para['transType'];
    $itemPrefix = '%pwcp%';

    if($para["repOption"] == "1")
    {
    
        $AllMembers = Members::whereHas('lineItems', function ($query) {
              $query->where('itemNo', 'like', '%pwcp%');
            })->count();

        $MembersYesterday = Members::where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '=', $searchDt)
            ->whereHas('lineItems', function ($query) {
              $query->where('itemNo', 'like', '%pwcp%');
            })->count();

        $MembersLast7Days = Members::where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '>=', $searchStartDt)
            ->where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '<=', $searchEndDt)
            ->whereHas('lineItems', function ($query) {
              $query->where('itemNo', 'like', '%pwcp%');
            })->count();

     
      return json_encode(['members'=>$AllMembers, 'membersYesterday'=>$MembersYesterday, 'membersLast7Days'=>$MembersLast7Days]);    
    
    }else if($para["repOption"] == "2"){      

        /*
        SELECT * FROM `notifications` 
        LEFT JOIN `lineItems` ON `notifications`.`id` = `lineItems`.`lnkid` 
        WHERE `notifications`.`transactionType` 
        like 'SALE' 
        AND `lineItems`.`itemNo` LIKE '%pwcp%'
        */

        //$a = $para["dateFltr"];

        if ($searchStartDt != '' && $searchEndDt != '')
        {
    
            $Members = Members::whereBetween('dt', [$searchStartDtRange, $searchEndDtRange])->where('transactionType','=', $searchTransType)->count();

        }elseif($para["dateFltr"] == 'ToDate'){

            $Members = Members::where('transactionType','=', $searchTransType)->count();

        }elseif($para["dateFltr"] == 'Yesterday'){

            $Members = Members::where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '=', $searchDt)->count();
        }else{

            $Members = Members::where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '>=', $searchStartDt)->where(DB::raw("(STR_TO_DATE(dt,'%Y-%m-%d'))"), '<=', $searchEndDt)->count();        
        }  

        return json_encode(['searchTransType'=>$Members]);    

    }else{

      
    }

    
  }

 }
