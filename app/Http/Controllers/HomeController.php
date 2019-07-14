<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vw_canceled = "vw_canceled_members";
        $canceledMembers = DB::table($vw_canceled)
        ->select('*')
        ->get();

        $vw_canceled_pic = "vw_pigman_canceled_members";
        $canceledMembers_pic = DB::table($vw_canceled_pic)
        ->select('*')
        ->get();

        $inactive = array();
        foreach ($canceledMembers as $key => $d) 
          $inactive[] = $d->email; 


        $inactive_pic = array();
        foreach ($canceledMembers_pic as $key => $d) 
          $inactive_pic[] = $d->email; 
  
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

        ////////////////////////////
        // PWCP
        ///////////////////////////       

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


        ////////////////////////////
        // PIC
        ///////////////////////////

        $allMembersPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive_pic)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')
        ->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();
  
        $membersYesterdayPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive_pic)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();
  
        $membersLast7DaysPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive_pic)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();
  
        $membersLast30DaysPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive_pic)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();

        $allMembersCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive_pic)
        ->where('pigman_billing.firstName', '<>', '')
        ->groupby('pigman_billing.email')->get();
  
        $membersYesterdayCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive_pic)
        ->where('pigman_billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('pigman_billing.email')->get();
  
        $membersLast7DaysCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive_pic)
        ->where('pigman_billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('pigman_billing.email')->get();
  
        $membersLast30DaysCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive_pic)
        ->where('pigman_billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('pigman_billing.email')->get();

        ////////////////////////  
          
        $listAll = DB::table('billing')
        ->distinct()
        ->select(
          'notifications.affiliate',
          DB::raw("(COUNT(DISTINCT billing.email)) as TotalMembers"),
          DB::raw("SUM(IF(notifications.transactionType='BILL',1,0)) as NoOfReBills")
          )
        ->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')
        ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('notifications.affiliate', '<>', '')
        ->where('billing.firstName', '<>', '')
        ->groupby('notifications.affiliate')->get(); 

        $totReBills = 0;
        foreach ($listAll as $key => $d) 
          $totReBills += $d->NoOfReBills;

        $affiliate = \Lava::DataTable();
        $affiliate->addStringColumn('Affiliate')
                     ->addNumberColumn('Members:'.$allMembers->count())
                     ->addNumberColumn('Re-Bills:'.$totReBills);

        foreach ($listAll as $key => $d) 
          $affiliate->addRow([$d->affiliate,  $d->TotalMembers, $d->NoOfReBills]);
        
        \Lava::LineChart('PWCPAffiliates', $affiliate, [
            'fontSize' => 12,
            'height' => 400,
            'legend' => [
              'position' => 'top',
              'textStyle' => [
                'fontSize' => 16
              ]
            ]              

        ]);
        

        //////////////////////////////


        $listAll = DB::table('billing')
        ->distinct()
        ->select(
          DB::raw("(DATE_FORMAT(notifications.dt,'%m/%e/%Y')) As Days"),
          DB::raw("(COUNT(DISTINCT billing.email)) as TotalMembers"),
          DB::raw("SUM(IF(notifications.transactionType='BILL',1,0)) as NoOfReBills")
          )
        ->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')
        ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('notifications.affiliate', '<>', '')
        ->where('billing.firstName', '<>', '')
        ->groupby(DB::raw("(DATE_FORMAT(notifications.dt,'%m/%e/%Y'))"))->orderby(DB::raw("(DATE_FORMAT(notifications.dt,'%m/%d/%Y'))"))->get(); 

   
        $affiliate = \Lava::DataTable();
        $affiliate->addStringColumn('Day')
                     ->addNumberColumn('Members:'.$allMembers->count())
                     ->addNumberColumn('Re-Bills:'.$totReBills);

        foreach ($listAll as $key => $d) 
            $affiliate->addRow([$d->Days,  $d->TotalMembers, $d->NoOfReBills]);
        
        \Lava::LineChart('PWCPAffiliatesByDay', $affiliate, [
            'fontSize' => 12,
            'height' => 400,
            'legend' => [
              'position' => 'top',
              'textStyle' => [
                'fontSize' => 16
              ]
            ]              
          ]);
        
        
        ////////////////


          $listAll = DB::table('billing')
          ->distinct()
          ->select(
            DB::raw("(DATE_FORMAT(notifications.dt,'%M/%Y')) As Months"),
            DB::raw("(COUNT(DISTINCT billing.email)) as TotalMembers"),
            DB::raw("SUM(IF(notifications.transactionType='BILL',1,0)) as NoOfReBills")
            )
          ->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')
          ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
          ->where('lineItems.itemNo', 'like', '%pwcp%')
          ->whereNotIn('billing.email', $inactive)
          ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
          ->where('notifications.affiliate', '<>', '')
          ->where('billing.firstName', '<>', '')
          ->groupby(DB::raw("(DATE_FORMAT(notifications.dt,'%M/%Y'))"))->orderby(DB::raw("(DATE_FORMAT(notifications.dt,'%m/%Y'))"))->get(); 
  
  
          $affiliate = \Lava::DataTable();
          $affiliate->addStringColumn('Month')
                       ->addNumberColumn('Members:'.$allMembers->count())
                       ->addRoleColumn('string', 'annotation')
                       ->addNumberColumn('Re-Bills:'.$totReBills)
                       ->addRoleColumn('string', 'annotation');


          foreach ($listAll as $key => $d) 
              $affiliate->addRow([$d->Months,  $d->TotalMembers, $d->TotalMembers, $d->NoOfReBills, $d->NoOfReBills]);
          
          \Lava::LineChart('PWCPAffiliatesByMonth', $affiliate, [
              'fontSize' => 12,
              'height' => 400,
              'legend' => [
                'position' => 'top',
                'textStyle' => [
                  'fontSize' => 16
                ]
              ]              
            ]);
          
          
          ////////////////
          $listAll = DB::table('billing')
          ->distinct()
          ->select(
            'lineItems.itemNo',
            DB::raw("(SUM(lineItems.quantity)) as TotalSales")
            )
          ->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')
          ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
          ->where('lineItems.itemNo', 'like', '%pwcp%')
          ->whereNotIn('billing.email', $inactive)
          ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
          //->where('notifications.affiliate', '<>', '')
          ->where('billing.firstName', '<>', '')
          ->groupby('lineItems.itemNo')->get(); 
  
          $totalSalesBySKU = \Lava::DataTable();

          $totalSalesBySKU->addStringColumn('Span')
                  ->addNumberColumn('SKU')
                  ->addRoleColumn('string', 'annotation');
          
          $tot = 0; 
          foreach ($listAll as $key => $d) 
          {
            $totalSalesBySKU->addRow([$d->itemNo,  $d->TotalSales, $d->TotalSales]);
            $tot += $d->TotalSales;
          }
                    

          \Lava::BarChart('totalSalesBySKU', $totalSalesBySKU, [
                'title' => 'Total Qty Sold: '.$tot,
                'titleTextStyle' => [
                  'color'    => '#000',
                  'fontSize' => 14
                ],
                'height' => 300,
                'legend' => [
                  'position' => 'none',
                ]               
              
  
          ]);
  
          $listAll = DB::table('pigman_billing')
          ->distinct()
          ->select(
            'pigman_lineItems.itemNo',
            DB::raw("(SUM(pigman_lineItems.quantity)) as TotalSales")
            )
          ->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')
          ->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
          ->where('pigman_lineItems.itemNo', 'like', '%pic%')
          ->whereNotIn('pigman_billing.email', $inactive_pic)
          ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
          //->where('pigman_notifications.affiliate', '<>', '')
          ->where('pigman_billing.firstName', '<>', '')
          ->groupby('pigman_lineItems.itemNo')->get(); 
  
          $PICtotalSalesBySKU = \Lava::DataTable();

          $PICtotalSalesBySKU->addStringColumn('Span')
                  ->addNumberColumn('SKU')
                  ->addRoleColumn('string', 'annotation');

          $tot = 0;                    
          foreach ($listAll as $key => $d) 
          {
            $PICtotalSalesBySKU->addRow([$d->itemNo,  $d->TotalSales, $d->TotalSales]);
            $tot += $d->TotalSales;
          }
            
  
          \Lava::BarChart('PICtotalSalesBySKU', $PICtotalSalesBySKU, [
                'title' => 'Total Qty Sold: '.$tot,
                'titleTextStyle' => [
                  'color'    => '#000',
                  'fontSize' => 14
                ],
                'height' => 300,
                'legend' => [
                  'position' => 'none',
                ]               
  
          ]);

          ////////////////

        $activeCanceled = \Lava::DataTable();

        $activeCanceled->addStringColumn('Span')
                ->addNumberColumn('Active')
                ->addRoleColumn('string', 'annotation')
                ->addNumberColumn('Canceled')
                ->addRoleColumn('string', 'annotation')
                ->addRow(['To Date', $allMembers->count(),$allMembers->count(), $allMembersCanceled->count(), $allMembersCanceled->count()])
                ->addRow(['Last 30 Days', $membersLast30Days->count(),$membersLast30Days->count(), $membersLast30DaysCanceled->count(), $membersLast30DaysCanceled->count()])
                ->addRow(['Last 7 Days', $membersLast7Days->count(),$membersLast7Days->count(), $membersLast7DaysCanceled->count(), $membersLast7DaysCanceled->count()])
                ->addRow(['Yesterday', $membersYesterday->count(),$membersYesterday->count(), $membersYesterdayCanceled->count(), $membersYesterdayCanceled->count()]);

        \Lava::ColumnChart('ActiveCanceled', $activeCanceled, [
              'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 16
              ],
              'height' => 300,
              'legend' => [
                'position' => 'top',
                'textStyle' => [
                  'fontSize' => 16
                ]
              ]               

        ]);




        $activeCanceledPIC = \Lava::DataTable();

        $activeCanceledPIC
                ->addStringColumn('Infraction')
                ->addNumberColumn('Active')
                ->addRoleColumn('string', 'annotation')
                ->addNumberColumn('Canceled')
                ->addRoleColumn('string', 'annotation')
                
                ->addRow(['To Date', $allMembersPIC->count(),$allMembersPIC->count(), $allMembersCanceledPIC->count(), $allMembersCanceledPIC->count()])
                ->addRow(['Last 30 Days', $membersLast30DaysPIC->count(),$membersLast30DaysPIC->count(), $membersLast30DaysCanceledPIC->count(), $membersLast30DaysCanceledPIC->count()])
                ->addRow(['Last 7 Days', $membersLast7DaysPIC->count(),$membersLast7DaysPIC->count(), $membersLast7DaysCanceledPIC->count(), $membersLast7DaysCanceledPIC->count()])
                ->addRow(['Yesterday', $membersYesterdayPIC->count(),$membersYesterdayPIC->count(), $membersYesterdayCanceledPIC->count(), $membersYesterdayCanceledPIC->count()]);

        \Lava::ColumnChart('ActiveCanceledPIC', $activeCanceledPIC, [
              'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 10
              ],
              'height' => 300,
              'legend' => [
                'position' => 'top',
                'textStyle' => [
                  'fontSize' => 16
                ]
              ]             
              
        ]);

        $activeCanceledPWPCOverall = \Lava::DataTable();
        $activeCanceledPWPCOverall
                ->addStringColumn('PWPC')
                ->addNumberColumn('Total')
                ->addRow(['Active:'.$allMembers->count(), $allMembers->count()])
                ->addRow(['Canceled:'.$allMembersCanceled->count(), $allMembersCanceled->count()]);
        
        \Lava::DonutChart('PWPCActiveCanceled', $activeCanceledPWPCOverall, [
            'legend' => [
              'textStyle' => [
                'fontSize' => 16
              ]
            ]
        ]);

        $activeCanceledPICOverall = \Lava::DataTable();
        $activeCanceledPICOverall
                ->addStringColumn('PIC')
                ->addNumberColumn('Total')
                ->addRow(['Active:'.$allMembersPIC->count(), $allMembersPIC->count()])
                ->addRow(['Canceled:'.$allMembersCanceledPIC->count(), $allMembersCanceledPIC->count()]);
        
        \Lava::DonutChart('PICActiveCanceled', $activeCanceledPICOverall, [
            'legend' => [
              'textStyle' => [
                'fontSize' => 16
              ]
            ]
        ]);


        /////////////////////

        //////////////////////////////


        $listAll = DB::table('billing')
        ->distinct()
        ->select(
          DB::raw("(DATE_FORMAT(notifications.dt,'%m/%e/%Y')) As Days"),
          DB::raw("(COUNT(DISTINCT billing.email)) as TotalMembers"),
          DB::raw("SUM(lineItems.productPrice) as TotalProductPrice"),
          DB::raw("SUM(lineItems.taxAmount) as TotaltaxAmount")
          )
        ->leftjoin('notifications', 'billing.lnkid', '=', 'notifications.id')
        ->leftjoin('lineItems', 'notifications.id', '=', 'lineItems.lnkid')
        ->where('lineItems.itemNo', 'like', '%pwcp%')
        ->whereNotIn('billing.email', $inactive)
        ->whereNotIn('notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('notifications.affiliate', '<>', '')
        ->where('billing.firstName', '<>', '')
        ->groupby(DB::raw("(DATE_FORMAT(notifications.dt,'%M/%Y'))"))->orderby(DB::raw("(DATE_FORMAT(notifications.dt,'%M/%Y'))"))->get(); 
   
        $affiliate = \Lava::DataTable();
        $affiliate->addStringColumn('Month')
                     ->addNumberColumn('Members')
                     ->addRoleColumn('string', 'annotation')
                     ->addNumberColumn('Product Price')
                     ->addRoleColumn('string', 'annotation')
                     ->addNumberColumn('Tax Amount')
                     ->addRoleColumn('string', 'annotation');

        foreach ($listAll as $key => $d) 
            $affiliate->addRow([$d->Days,  $d->TotalMembers,$d->TotalMembers, round($d->TotalProductPrice,2),'$'.round($d->TotalProductPrice,2), round($d->TotaltaxAmount,2),'$'.round($d->TotaltaxAmount,2)]);
        
        \Lava::ColumnChart('PWCPAffiliatesByPrice', $affiliate, [
            'fontSize' => 12,
            'height' => 400,
            'legend' => [
              'position' => 'top',
              'textStyle' => [
                'fontSize' => 16
              ]
            ]              
          ]);
        


        // $temperatures = \Lava::DataTable();
        // $temperatures->addDateColumn('Date')
        //              ->addNumberColumn('Max Temp')
        //              ->addNumberColumn('Mean Temp')
        //              ->addNumberColumn('Min Temp')
        //              ->addRow(['2014-10-1',  67, 65, 62])
        //              ->addRow(['2014-10-2',  68, 65, 61])
        //              ->addRow(['2014-10-3',  68, 62, 55])
        //              ->addRow(['2014-10-4',  72, 62, 52])
        //              ->addRow(['2014-10-5',  61, 54, 47])
        //              ->addRow(['2014-10-6',  70, 58, 45])
        //              ->addRow(['2014-10-7',  74, 70, 65])
        //              ->addRow(['2014-10-8',  75, 69, 62])
        //              ->addRow(['2014-10-9',  69, 63, 56])
        //              ->addRow(['2014-10-10', 64, 58, 52])
        //              ->addRow(['2014-10-11', 59, 55, 50])
        //              ->addRow(['2014-10-12', 65, 56, 46])
        //              ->addRow(['2014-10-13', 66, 56, 46])
        //              ->addRow(['2014-10-14', 75, 70, 64])
        //              ->addRow(['2014-10-15', 76, 72, 68])
        //              ->addRow(['2014-10-16', 71, 66, 60])
        //              ->addRow(['2014-10-17', 72, 66, 60])
        //              ->addRow(['2014-10-18', 63, 62, 62]);
        
        // \Lava::LineChart('Temps', $temperatures, [
        //     'title' => 'Weather in October'
        // ]);
        


        // $population = \Lava::DataTable();
        // $population->addDateColumn('Year')
        //         ->addNumberColumn('Number of People')
        //         ->addRow(['2006', 623452])
        //         ->addRow(['2007', 685034])
        //         ->addRow(['2008', 716845])
        //         ->addRow(['2009', 757254])
        //         ->addRow(['2010', 778034])
        //         ->addRow(['2011', 792353])
        //         ->addRow(['2012', 839657])
        //         ->addRow(['2013', 842367])
        //         ->addRow(['2014', 873490]);

        // \Lava::AreaChart('Population', $population, [
        //     'title' => 'Population Growth',
        //     'legend' => [
        //         'position' => 'in'
        //     ]
        // ]);


        // $reasons1 = \Lava::DataTable();
        // $reasons1->addStringColumn('Reasons')
        //         ->addNumberColumn('Percent')
        //         ->addRow(['Check Reviews', 5])
        //         ->addRow(['Watch Trailers', 2])
        //         ->addRow(['See Actors Other Work', 4])
        //         ->addRow(['Settle Argument', 89]);
        
        // \Lava::PieChart('IMDB1', $reasons1, [
        //     'title'  => 'Reasons I visit IMDB',
        //     'is3D'   => true,*
        //     'slices' => [
        //         ['offset' => 0.2],
        //         ['offset' => 0.25],
        //         ['offset' => 0.3]
        //     ]
        // ]);

        // $reasons2 = \Lava::DataTable();
        // $reasons2->addStringColumn('Reasons')
        //         ->addNumberColumn('Percent')
        //         ->addRow(['Check Reviews', 5])
        //         ->addRow(['Watch Trailers', 2])
        //         ->addRow(['See Actors Other Work', 4])
        //         ->addRow(['Settle Argument', 89]);

        // \Lava::DonutChart('IMDB2', $reasons2, [
        //     'title' => 'Reasons I visit IMDB'
        // ]);

        // $votes  = \Lava::DataTable();
        // $votes->addStringColumn('Food Poll')
        //     ->addNumberColumn('Votes')
        //     ->addRow(['Tacos',  rand(1000,5000)])
        //     ->addRow(['Salad',  rand(1000,5000)])
        //     ->addRow(['Pizza',  rand(1000,5000)])
        //     ->addRow(['Apples', rand(1000,5000)])
        //     ->addRow(['Fish',   rand(1000,5000)]);

        // \Lava::BarChart('Votes', $votes);
        
        //$data['Votes'] = \Lava::BarChart('Votes', $votes);
        //return view('home', $data);

        return view('home');
    }
}
