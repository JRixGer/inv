<?php

/*
  
  This controller is reponsible for showing admin dashboard graphs for different inventory analysis information
  
*/

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

        /*
        Multiple queries above are used for difference dashboard graphs below
        */



        

        ///////////////////
          
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

        /*
        
        Code below will show a line chart for the PWCPAffiliates, By Affiliates

        */

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
        

        /*
        
        Code below will show a line chart for the PWCPAffiliates, By Daily

        */


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
        

        
        
        /*
        
        Code below will show a line chart for the PWCPAffiliates, By Monthly

        */



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
          


          
          /*
        
         Code below will show a Bar Chart for the total sales, By SKU

         */


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
                  'fontSize' => 16
                ],
                'height' => 300,
                'legend' => [
                  'position' => 'none',
                ]               
              
  
          ]);
  



         /*
        
         Code below will show a Bar Chart for the PIC total Sales, By SKU

         */

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
                  'fontSize' => 16
                ],
                'height' => 300,
                'legend' => [
                  'position' => 'none',
                ]               
  
          ]);




         /*
        
         Code below will show a Column Chart for the Total Members (Active & Canceled)

         */

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
              'title' => 'Total Members (Active & Canceled): '. ((int)$allMembers->count()+(int)$allMembersCanceled->count()),
              'titleTextStyle' => [
                'color'    => '#000',
                'fontSize' => 16
              ],
              'height' => 300,
              'legend' => [
                'position' => 'bottom',
                'textStyle' => [
                  'fontSize' => 12
                ]
              ]               

        ]);




         /*
        
         Code below will show a Column Chart for the Total Members (Active & Canceled) - PIC category

         */

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
              'title' => 'Total Members (Active & Canceled): '.((int)$allMembersPIC->count()+(int)$allMembersCanceledPIC->count()),
              'titleTextStyle' => [
                'color'    => '#000',
                'fontSize' => 16
              ],
              'height' => 300,
              'legend' => [
                'position' => 'bottom',
                'textStyle' => [
                  'fontSize' => 12
                ]
              ]             
              
        ]);

        


        /*
        
        Code below will show a Pie Chart for the Total Members (Active & Canceled) - PWPC category

        */

        $activeCanceledPWPCOverall = \Lava::DataTable();
        $activeCanceledPWPCOverall
                ->addStringColumn('PWPC')
                ->addNumberColumn('Total')
                ->addRow(['Active:'.$allMembers->count(), $allMembers->count()])
                ->addRow(['Canceled:'.$allMembersCanceled->count(), $allMembersCanceled->count()]);
        
        \Lava::PieChart('PWPCActiveCanceled', $activeCanceledPWPCOverall, [
            'title' => 'Total Members (Active & Canceled): '.((int)$allMembers->count()+(int)$allMembersCanceled->count()),
            'titleTextStyle' => [
              'color'    => '#000',
              'fontSize' => 16
            ],
            'height' => 250,
            'legend' => [
              'position' => 'labeled',
              'textStyle' => [
                'fontSize' => 16
              ]
            ]
        ]);



        
        /*
        
        Code below will show a Pie Chart for the Total Members (Active & Canceled) - PIC category

        */

        $activeCanceledPICOverall = \Lava::DataTable();
        $activeCanceledPICOverall
                ->addStringColumn('PIC')
                ->addNumberColumn('Total')
                ->addRow(['Active:'.$allMembersPIC->count(), $allMembersPIC->count()])
                ->addRow(['Canceled:'.$allMembersCanceledPIC->count(), $allMembersCanceledPIC->count()]);
        
        \Lava::PieChart('PICActiveCanceled', $activeCanceledPICOverall, [
          'title' => 'Total Members (Active & Canceled): '.((int)$allMembersPIC->count()+(int)$allMembersCanceledPIC->count()),
            'titleTextStyle' => [
              'color'    => '#000',
              'fontSize' => 16
            ],
            'height' => 250,
            'legend' => [
              'position' => 'labeled',
              'textStyle' => [
                'fontSize' => 16
              ]
            ]
        ]);





        /*
        
        Code below will show a Column Chart for the Affiliates By Price - PWCP category

        */

        $listAll = DB::table('billing')
        ->distinct()
        ->select(
          DB::raw("(DATE_FORMAT(notifications.dt,'%M/%Y')) As Months"),
          DB::raw("(COUNT(DISTINCT billing.email)) as TotalMembers"),
          DB::raw("SUM(lineItems.productPrice) as TotalProductPrice"),
          DB::raw("SUM(lineItems.shippingAmount) as TotalshippingAmount"),
          DB::raw("SUM(lineItems.taxAmount) as TotaltaxAmount")
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
                     ->addNumberColumn('Members')
                     ->addRoleColumn('string', 'annotation')
                     ->addNumberColumn('Product Price')
                     ->addRoleColumn('string', 'annotation')
                     ->addNumberColumn('Shipping Amount')
                     ->addRoleColumn('string', 'annotation')
                     ->addNumberColumn('Tax Amount')
                     ->addRoleColumn('string', 'annotation');
        foreach ($listAll as $key => $d) 
            $affiliate->addRow([$d->Months,  $d->TotalMembers,$d->TotalMembers, round($d->TotalProductPrice,2),'$'.round($d->TotalProductPrice,2), round($d->TotalshippingAmount,2),'$'.round($d->TotalshippingAmount,2), round($d->TotaltaxAmount,2),'$'.round($d->TotaltaxAmount,2)]);
        
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
        

        return view('home');
    }
}
