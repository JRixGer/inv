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
    
    $listAll = null;
    $AllMembers = 0;
    $MembersYesterday = 0;
    $MembersLast7Days = 0;
    $MembersLast30Days = 0;

    $searchStartDt = date('Y-m-d',strtotime("now"));
    $searchEndDt = date('Y-m-d',strtotime("now"));
    $searchDt = date('Y-m-d',strtotime("now")-86400);

    $searchStartDt7 = date('Y-m-d',strtotime("now")-604800);
    $searchStartDt30 = date('Y-m-d',strtotime("now")-2629744);
    
    $searchStartDtRange =  date('Y-m-d',strtotime($para['fromDt']));
    $searchEndDtRange =  date('Y-m-d',strtotime($para['toDt']));  

    $searchTransType = $para['transType'];
    $itemPrefix = '%pwcp%';

    if($para["repOption"] == "1")
    {
    
        $allMembers = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersYesterday = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast7Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $MembersLast30Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $listAll = DB::table('billing')
            ->distinct()
            ->select(
              'billing.firstName',
              'billing.lastName',
              'billing.email',
              DB::raw("(GROUP_CONCAT(STR_TO_DATE(notifications.dt,'%Y-%m-%d') SEPARATOR ', ')) as Dates"),
              DB::raw("(GROUP_CONCAT(lineItems.itemNo SEPARATOR ', ')) as SKUs"),
              DB::raw("(GROUP_CONCAT(lineItems.productTitle SEPARATOR ', ')) as ProductNames"),
              DB::raw("(GROUP_CONCAT(notifications.receipt SEPARATOR ', ')) as Receipts"),
              DB::raw("SUM(IF(notifications.transactionType='BILL',1,0)) as NoOfReBills")
               )
            ->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')
            ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
            ->where('lineItems.itemNo', 'like', '%pwcp%')
            ->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')
            ->where('notifications.transactionType', '<>', 'CANCEL-REBILL')
            ->where('notifications.transactionType', '<>', 'CGBK')
            ->where('notifications.transactionType', '<>', 'TEST')
            ->where('notifications.transactionType', '<>', 'TEST_BILL')
            ->where('notifications.transactionType', '<>', 'TEST_SALE')
            ->where('billing.firstName', '<>', '')
            ->groupby('billing.firstName', 'billing.lastName','billing.email')
            ->get();

        return json_encode(['listAll'=>$listAll, 'members'=>$allMembers->count(), 'membersYesterday'=>$membersYesterday->count(), 'membersLast7Days'=>$membersLast7Days->count(), 'membersLast30Days'=>$MembersLast30Days->count()]);    
    
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
