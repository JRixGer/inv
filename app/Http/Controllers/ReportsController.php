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

    $canceledMembers = DB::table('vw_canceled_members')
    ->select('*')
    ->get();
    
    $inactive = array();

    foreach ($canceledMembers as $key => $d) 
      $inactive[] = $d->email; 

    if($para["repOption"] == "1")
    {
    
        $allMembers = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersYesterday = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast7Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast30Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
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
            ->whereNotIn('billing.email', $inactive)
            ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
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
          ->whereNotIn('billing.email', $inactive)
          ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
          ->where('billing.firstName', '<>', '')
          ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDtRange)
          ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '<=', $searchEndDtRange)
          ->groupby('billing.firstName', 'billing.lastName','billing.email')
          ->get();
          return json_encode(['listAll'=> $listAll]);    
      }

    }else if($para["repOption"] == "3"){      

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
          ->whereIn('billing.email', $inactive)
          ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
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
        
        $allMembers = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersYesterday = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast7Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
  
        $membersLast30Days = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.firstName', 'billing.lastName','billing.email')->get();

        $membersRange = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDtRange)
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '<=', $searchEndDtRange)
        ->groupby('billing.firstName', 'billing.lastName','billing.email')->get();

        $allMembersCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('billing.email', $inactive)
        ->where('billing.firstName', '<>', '')
        ->groupby('billing.email')->get();
  
        $membersYesterdayCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('billing.email', $inactive)
         ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('billing.email')->get();
  
        $membersLast7DaysCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('billing.email', $inactive)
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('billing.email')->get();
  
        $membersLast30DaysCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('billing.email', $inactive)
        ->where('billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('billing.email')->get();

        $membersRangeCanceled = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereIn('billing.email', $inactive)
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDtRange)
        ->where(DB::raw("(STR_TO_DATE(notifications.dt,'%Y-%m-%d'))"), '<=', $searchEndDtRange)
        ->where('billing.firstName', '<>', '')
        ->groupby('billing.email')->get();

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
    }else if($para["repOption"] == "6"){      


        $totalAffiliates = DB::table('notifications')
          ->distinct()
          ->select('notifications.affiliate')
          ->leftjoin('billing', 'notifications.id', '=', 'billing.lnkid')
          ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
          ->where('lineItems.itemNo', 'like', '%pwcp%')
          ->whereNotIn('billing.email', $inactive)
          ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
          ->where('notifications.affiliate', '<>', '')
          ->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
    
        
        $allMembers = DB::table('billing')->distinct()->select('billing.firstName','billing.lastName','billing.email')->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('billing.firstName', '<>', '')
        ->groupby('billing.firstName', 'billing.lastName','billing.email')->get();
         
        $listAll = DB::table('notifications')
          ->distinct()
          ->select(
            'notifications.affiliate',
            DB::raw("(GROUP_CONCAT(billing.email SEPARATOR ', ')) as Emails"),
            DB::raw("(COUNT(notifications.affiliate)) as TotalMembers"),
            DB::raw("(GROUP_CONCAT(CONCAT(billing.firstName,' ',billing.lastName) SEPARATOR ', ')) as Members"),
            DB::raw("(GROUP_CONCAT(STR_TO_DATE(notifications.dt,'%Y-%m-%d') SEPARATOR ', ')) as Dates"),
            DB::raw("(GROUP_CONCAT(lineItems.itemNo SEPARATOR ', ')) as SKUs"),
            DB::raw("(GROUP_CONCAT(lineItems.productTitle SEPARATOR ', ')) as ProductNames"),
            DB::raw("(GROUP_CONCAT(notifications.receipt SEPARATOR ', ')) as Receipts"),
            DB::raw("SUM(IF(notifications.transactionType='BILL',1,0)) as NoOfReBills")
            )
          ->leftjoin('billing', 'notifications.id', '=', 'billing.lnkid')
          ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
          ->where('lineItems.itemNo', 'like', '%pwcp%')
          ->whereNotIn('billing.email', $inactive)
          ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
          ->where('notifications.affiliate', '<>', '')
          ->groupby('notifications.affiliate')
          ->get();

          return json_encode(['listAll'=> $listAll,'totalAffiliates'=> $totalAffiliates->count(),'allMembers'=> $allMembers->count()]);   


    }else if($para["repOption"] == "7"){ 
         
      $listAll = DB::table('vw_CB_IS_Active')
      ->distinct()
      ->select(
        'vw_CB_IS_Active.lnk_name',
        'vw_CB_IS_Active.CB_FirstName',
        'vw_CB_IS_Active.CB_LastName',
        'vw_CB_IS_Active.CB_Email',
        'vw_CB_IS_Active.CB_Dates',
        'vw_CB_IS_Active.CB_SKUs',
        'vw_CB_IS_Active.CB_ProductNames',
        'vw_CB_IS_Active.CB_Receipts',
        'vw_CB_IS_Active.CB_NoOfReBills',
        'vw_CB_IS_Active.lnk_name',
        'vw_CB_IS_Active.IS_FirstName',
        'vw_CB_IS_Active.IS_LastName',
        DB::raw("(GROUP_CONCAT(is_pwcp_active.OrderDate SEPARATOR ', ')) as IS_OrderDate"),
        DB::raw("(GROUP_CONCAT(is_pwcp_active.OrderTitle SEPARATOR ', ')) as IS_OrderTitle"),
        DB::raw("(GROUP_CONCAT(is_pwcp_active.ProductName SEPARATOR ', ')) as IS_ProductNames")
        )
      ->leftjoin('is_pwcp_active', 'vw_CB_IS_Active.lnk_name', '=', 'is_pwcp_active.lnk_name')
      ->groupby('vw_CB_IS_Active.lnk_name')
      ->get();

      if($para["remMatch"] == "1")
      {
        $listAll = $listAll->toArray();
        foreach ($listAll as $key => $d) {
          if(!empty($d->CB_FirstName) && !empty($d->IS_FirstName))
          {
            $arrSKUs = explode(" ",$d->CB_SKUs);
            $arrReceipts = explode(" ",$d->CB_Receipts);
            for($i = 0; $i < sizeof($arrSKUs); $i++)
            {
              if (strpos($d->IS_ProductNames, $arrSKUs[$i])) {
                unset($listAll[$key]);
              }
            }
            for($i = 0; $i < sizeof($arrReceipts); $i++)
            {
              if (strpos($d->IS_OrderTitle, $arrReceipts[$i])) {
                unset($listAll[$key]);
              }
            }
  
          }
        }
        array_multisort($listAll, SORT_DESC);
      }
      return json_encode(['listAll'=> $listAll]);   
    }else{

      
    }

    
  }

 }
