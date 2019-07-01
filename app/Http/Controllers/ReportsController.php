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
    $membersRange = 0;

    $allMembersCanceled = 0;
    $membersYesterdayCanceled = 0;
    $membersLast7DaysCanceled = 0;
    $membersLast30DaysCanceled = 0;
    $membersRangeCanceled = 0;

    $searchStartDt = date('Y-m-d',strtotime("now"));
    $searchDt = date('Y-m-d',strtotime("now")-86400);

    $searchStartDt7 = date('Y-m-d',strtotime("now")-604800);
    $searchStartDt30 = date('Y-m-d',strtotime("now")-2629744);
    
    $searchStartDtRange =  date('Y-m-d',strtotime($para['fromDt']));
    $searchEndDtRange =  date('Y-m-d',strtotime($para['toDt']));  
    //echo $searchStartDtRange."  -  ".$searchEndDtRange;
    $searchTransType = $para['transType'];
    $itemPrefix = '%pwcp%';

    if($para["repOption"] == "1")
    {
    
        $allMembers = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersYesterday = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast7Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast30Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')->where('lineItems.itemNo', 'like', '%pwcp%')->where('notifications.transactionType', '<>', 'ABANDONED_ORDER')->where('notifications.transactionType', '<>', 'CANCEL-REBILL')->where('notifications.transactionType', '<>', 'CGBK')->where('notifications.transactionType', '<>', 'TEST')->where('notifications.transactionType', '<>', 'TEST_BILL')->where('notifications.transactionType', '<>', 'TEST_SALE')->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
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

        return json_encode(['listAll'=>$listAll, 'members'=>$allMembers->count(), 'membersYesterday'=>$membersYesterday->count(), 'membersLast7Days'=>$membersLast7Days->count(), 'membersLast30Days'=>$membersLast30Days->count()]);    
    
    }else if($para["repOption"] == "2"){      

      if ($searchStartDtRange != '' && $searchEndDtRange != '')
      {
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
          ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDtRange)
          ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '<=', $searchEndDtRange)
          ->groupby('billing.firstName', 'billing.lastName','billing.email')
          ->get();
          return json_encode(['listAll'=> $listAll]);    
      }

    }else if($para["repOption"] == "4"){      

      if ($searchStartDtRange != '' && $searchEndDtRange != '')
      {
        
        $allMembers = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'TEST', 'TEST_BILL', 'TEST_SALE'])
        ->where('billing.firstName', '<>', '')->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersYesterday = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'TEST', 'TEST_BILL', 'TEST_SALE'])
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast7Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'TEST', 'TEST_BILL', 'TEST_SALE'])
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast30Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'TEST', 'TEST_BILL', 'TEST_SALE'])
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();

        $membersRange = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'TEST', 'TEST_BILL', 'TEST_SALE'])
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDtRange)
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '<=', $searchEndDtRange)
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();

        $allMembersCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'RFND'])
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersYesterdayCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'RFND'])
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])

        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast7DaysCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'RFND'])
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])

        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast30DaysCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'RFND'])
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])

        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();

        $membersRangeCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.phoneNumber','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('notifications.transactionType', ['ABANDONED_ORDER', 'CANCEL-REBILL', 'CGBK', 'RFND'])
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDtRange)
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '<=', $searchEndDtRange)
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();

        return json_encode([
          'members'=>$allMembers->count(), 
          'membersYesterday'=>$membersYesterday->count(), 
          'membersLast7Days'=>$membersLast7Days->count(), 
          'membersLast30Days'=>$membersLast30Days->count(),
          'membersRange'=>$membersRange->count(),
          'membersCanceled'=>$allMembersCanceled->count(), 
          'membersYesterdayCanceled'=>$membersYesterdayCanceled->count(), 
          'membersLast7DaysCanceled'=>$membersLast7DaysCanceled->count(), 
          'membersLast30DaysCanceled'=>$membersLast30DaysCanceled->count(),
          'membersRangeCanceled'=>$membersRangeCanceled->count()
        ]);   

      }

    }else{

      
    }

    
  }

 }
