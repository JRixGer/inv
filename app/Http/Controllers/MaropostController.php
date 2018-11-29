<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;
use DB;

class MaropostController extends Controller
{


 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
    	//return view('admin.categories.index')->with('categories', Category::all());

      //, DB::raw("DATE_FORMAT(cust.cust_dob, '%d-%b-%Y')

        $maro = DB::table('notifications')
            ->select(
                  'notifications.id as id',
                  'notifications.dt as dt',
                  'notifications.vendor as notifications_vendor',
                  'notifications.transactionTime as notifications_transactionTime',
                  'notifications.receipt as notifications_receipt',
                  'notifications.transactionType as notifications_transactionType',     
                  'notifications.posted as notifications_posted',     
                  'billing.firstName as billing_firstName',
                  'billing.lastName as billing_lastName',
                  'billing.fullName as billing_fullName',
                  'billing.phoneNumber as billing_phoneNumber',
                  'billing.email as billing_email',
                  'billing_address.state as billing_state',
                  'billing_address.postalCode as billing_postalCode',
                  'billing_address.country as billing_country',
                  'lineItems.itemNo as lineItems_itemNo',
                  'lineItems.productTitle as lineItems_productTitle',
                  'lineItems.shippable as lineItems_shippable',
                  'lineItems.recurring as lineItems_recurring',
                  'lineItems.accountAmount as lineItems_accountAmount',
                  'lineItems.quantity as lineItems_quantity',
                  'lineItems.downloadUrl as lineItems_downloadUrl',
                  'lineItems.productPrice as lineItems_productPrice',
                  'lineItems.productDiscount as lineItems_productDiscount',
                  'lineItems.taxAmount as lineItems_taxAmount',
                  'lineItems.shippingAmount as lineItems_shippingAmount',
                  'lineItems.shippingLiable as lineItems_shippingLiable',
                  'lineItems.paymentsProcessed as lineItems_paymentsProcessed',
                  'lineItems.paymentsRemaining as lineItems_paymentsRemaining',
                  'lineItems.nextPaymentDate as lineItems_nextPaymentDate',
                  'lineItems.affiliatePayout as lineItems_affiliatePayout',
                  'lineItems.lineItemType as lineItems_lineItemType',
                  'notifications.affiliate as notifications_affiliate'
                  )
            ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
            ->leftjoin('billing', 'billing.lnkid', '=', 'notifications.id')
            ->leftjoin('billing_address', 'billing_address.lnkid', '=', 'notifications.id')
            ->where('notifications.vendor', '=', 'totalpat')
            ->where('notifications.transactionType', '<>', 'TEST')
            ->where('notifications.transactionType', '<>', 'TEST_SALE')
            ->where('billing.email', '<>', '')
            ->where(
              function($query){
                return $query
                  ->orWhere('lineItems.itemNo', 'LIKE', '%cptbook%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%sgfl%')
                  ->orWhere('lineItems.itemNo', 'LIKE', 'swt%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%tclsr%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%cpslbag%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%cpusbat%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%backpk%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%gbgknf%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%extbpk%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%stflpkn%');
              }
            )
            ->orderby('notifications.id', 'desc')
            ->paginate(14);
            //->get();

            return view('shipping.maropost', compact('maro')); 

    	//return view('shipping.raw')->with('raw', Notifications::all());
     }
    

    //maroPost_fn($r);

    public function mpost(Request $request)
    {

        $receipt = $request->all();
        $res = maroPost_fn($receipt['r']);
        
        $output = array(
            'success'     =>  'Got Simple Ajax Request.',
            'posted'   =>  'ok'
        );

        echo json_encode($output);

    }

    // below are for vuejs
    public function mount()
    {
        
       $maro = DB::table('notifications')
          ->select(
                'notifications.id as id',
                'notifications.dt as dt',
                'notifications.vendor as notifications_vendor',
                'notifications.transactionTime as notifications_transactionTime',
                'notifications.receipt as notifications_receipt',
                'notifications.transactionType as notifications_transactionType',     
                'notifications.posted as notifications_posted',     
                'billing.firstName as billing_firstName',
                'billing.lastName as billing_lastName',
                'billing.fullName as billing_fullName',
                'billing.phoneNumber as billing_phoneNumber',
                'billing.email as billing_email',
                'billing_address.state as billing_state',
                'billing_address.postalCode as billing_postalCode',
                'billing_address.country as billing_country',
                'lineItems.itemNo as lineItems_itemNo',
                'lineItems.productTitle as lineItems_productTitle',
                'lineItems.shippable as lineItems_shippable',
                'lineItems.recurring as lineItems_recurring',
                'lineItems.accountAmount as lineItems_accountAmount',
                'lineItems.quantity as lineItems_quantity',
                'lineItems.downloadUrl as lineItems_downloadUrl',
                'lineItems.productPrice as lineItems_productPrice',
                'lineItems.productDiscount as lineItems_productDiscount',
                'lineItems.taxAmount as lineItems_taxAmount',
                'lineItems.shippingAmount as lineItems_shippingAmount',
                'lineItems.shippingLiable as lineItems_shippingLiable',
                'lineItems.paymentsProcessed as lineItems_paymentsProcessed',
                'lineItems.paymentsRemaining as lineItems_paymentsRemaining',
                'lineItems.nextPaymentDate as lineItems_nextPaymentDate',
                'lineItems.affiliatePayout as lineItems_affiliatePayout',
                'lineItems.lineItemType as lineItems_lineItemType',
                'notifications.affiliate as notifications_affiliate'
                )
          ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
          ->leftjoin('billing', 'billing.lnkid', '=', 'notifications.id')
          ->leftjoin('billing_address', 'billing_address.lnkid', '=', 'notifications.id')
          ->where('notifications.vendor', '=', 'totalpat')
          ->where('notifications.transactionType', '<>', 'TEST')
          ->where('notifications.transactionType', '<>', 'TEST_SALE')
          ->where('billing.email', '<>', '')
          ->where(
            function($query){
              return $query
                  ->orWhere('lineItems.itemNo', 'LIKE', '%cptbook%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%sgfl%')
                  ->orWhere('lineItems.itemNo', 'LIKE', 'swt%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%tclsr%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%cpslbag%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%cpusbat%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%backpk%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%gbgknf%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%extbpk%')
                  ->orWhere('lineItems.itemNo', 'LIKE', '%stflpkn%');
            }
          )
          ->orderby('notifications.id', 'desc')
          ->limit(15)
          ->get();

        return response()->json([
            'maro'    => $maro,
        ], 200);        

    }
}
