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
        
        $inactive = array();
        foreach ($canceledMembers as $key => $d) 
          $inactive[] = $d->email; 

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


        $affiliate = \Lava::DataTable();
        $affiliate->addStringColumn('Affiliate')
                     ->addNumberColumn('Members')
                     ->addNumberColumn('Re-Bills');

        foreach ($listAll as $key => $d) 
            $affiliate->addRow([$d->affiliate,  $d->TotalMembers, $d->NoOfReBills]);
        
        \Lava::LineChart('PWCPAffiliates', $affiliate, [
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 16
                ]
        ]);
        
        //////////////////////////////



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

        $activeCanceled = \Lava::DataTable();

        $activeCanceled->addStringColumn('Span')
                ->addNumberColumn('Active')
                ->addNumberColumn('Canceled')
                ->addRow(['To Date', $allMembers->count(), $allMembersCanceled->count()])
                ->addRow(['Last 30 Days', $membersLast30Days->count(), $membersLast30DaysCanceled->count()])
                ->addRow(['Last 7 Days', $membersLast7Days->count(), $membersLast7DaysCanceled->count()])
                ->addRow(['Yesterday', $membersYesterday->count(), $membersYesterdayCanceled->count()]);

        \Lava::ColumnChart('ActiveCanceled', $activeCanceled, [
              'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 16
              ]
        ]);




        ////////////////////////////
        // PIC
        ///////////////////////////

        $allMembersPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')
        ->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();
  
        $membersYesterdayPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();
  
        $membersLast7DaysPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();
  
        $membersLast30DaysPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereNotIn('pigman_billing.email', $inactive)
        ->whereNotIn('pigman_notifications.transactionType', ['TEST', 'TEST_BILL','TEST_SALE'])
        ->where('pigman_billing.firstName', '<>', '')

        ->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('pigman_billing.firstName', 'pigman_billing.lastName','pigman_billing.email')->get();

        $allMembersCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive)
        ->where('pigman_billing.firstName', '<>', '')
        ->groupby('pigman_billing.email')->get();
  
        $membersYesterdayCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive)
        ->where('pigman_billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '=', $searchDt)->groupby('pigman_billing.email')->get();
  
        $membersLast7DaysCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive)
        ->where('pigman_billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt7)->groupby('pigman_billing.email')->get();
  
        $membersLast30DaysCanceledPIC = DB::table('pigman_billing')->distinct()->select('pigman_billing.firstName','pigman_billing.lastName','pigman_billing.email')->leftjoin('pigman_notifications', 'pigman_billing.lnkid', '=', 'pigman_notifications.id')->leftjoin('pigman_lineItems', 'pigman_notifications.id', '=', 'pigman_lineItems.lnkid')
        ->where('pigman_lineItems.itemNo', 'like', '%pic%')
        ->whereIn('pigman_billing.email', $inactive)
        ->where('pigman_billing.firstName', '<>', '')->where(DB::raw("(STR_TO_DATE(pigman_notifications.dt,'%Y-%m-%d'))"), '>=', $searchStartDt30)->groupby('pigman_billing.email')->get();


        $activeCanceledPIC = \Lava::DataTable();

        $activeCanceledPIC->addStringColumn('Span')
                ->addNumberColumn('Active')
                ->addNumberColumn('Canceled')
                ->addRow(['To Date', $allMembersPIC->count(), $allMembersCanceledPIC->count()])
                ->addRow(['Last 30 Days', $membersLast30DaysPIC->count(), $membersLast30DaysCanceledPIC->count()])
                ->addRow(['Last 7 Days', $membersLast7DaysPIC->count(), $membersLast7DaysCanceledPIC->count()])
                ->addRow(['Yesterday', $membersYesterdayPIC->count(), $membersYesterdayCanceledPIC->count()]);

        \Lava::ColumnChart('ActiveCanceledPIC', $activeCanceledPIC, [
              'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 16
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
        //     'is3D'   => true,
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
