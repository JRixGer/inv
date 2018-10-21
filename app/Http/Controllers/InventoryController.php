<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
    	//return view('admin.categories.index')->with('categories', Category::all());

        $inv = DB::table('notifications')
                        ->select(
                              'notifications.id as id',
                              'notifications.vendor as notifications_vendor',
                              'notifications.transactionTime as notifications_transactionTime',
                              'notifications.receipt as notifications_receipt',
                              'notifications.transactionType as notifications_transactionType',     
                              'billing.firstName as billing_firstName',
                              'billing.lastName as billing_lastName',
                              'billing.fullName as billing_fullName',
                              'billing.phoneNumber as billing_phoneNumber',
                              'billing.email as billing_email',
                              'billing_address.state as billing_state',
                              'billing_address.postalCode as billing_postalCode',
                              'billing_address.country as billing_country',
                              'shipping.firstName as shipping_firstName',
                              'shipping.lastName as shipping_lastName',
                              'shipping.fullName as shipping_fullName',
                              'shipping.phoneNumber as shipping_phoneNumber',
                              'shipping.email as shipping_email',
                              'shipping_address.address1 as shipping_address1',
                              'shipping_address.address2 as shipping_address2',
                              'shipping_address.city as shipping_city',
                              'shipping_address.county as shipping_county',
                              'shipping_address.state as shipping_state',
                              'shipping_address.postalCode as shipping_postalCode',
                              'shipping_address.country as shipping_country',
                              'lineItems.itemNo as lineItems_itemNo',
                              'lineItems.productTitle as lineItems_productTitle',
                              'lineItems.shippable as lineItems_shippable',
                              'lineItems.recurring as lineItems_recurring',
                              'lineItems.accountAmount as lineItems_accountAmount',
                              'lineItems.quantity as lineItems_quantity',
                              'lineItems.downloadUrl as lineItems_downloadUrl',
                              'lineItems.lineItemType as lineItems_lineItemType',
                              'notifications.affiliate as notifications_affiliate',
                              'notifications.role as notifications_role',
                              'notifications.totalAccountAmount as notifications_totalAccountAmount',
                              'notifications.paymentMethod as notifications_paymentMethod',
                              'notifications.totalOrderAmount as notifications_totalOrderAmount',
                              'notifications.totalTaxAmount as notifications_totalTaxAmount',
                              'notifications.totalShippingAmount as notifications_totalShippingAmount',
                              'notifications.currency as notifications_currency',
                              'notifications.orderLanguage as notifications_orderLanguage',
                              'notifications.version as notifications_version',
                              'notifications.attemptCount as notifications_attemptCount',     
                              'trackingCodes.trackingCodes as trackingCodes_trackingCodes',
                              'hopfeed.hopfeedClickId as hopfeed_hopfeedClickId',
                              'hopfeed.hopfeedApplicationId as hopfeed_hopfeedApplicationId',
                              'hopfeed.hopfeedCreativeId as hopfeed_hopfeedCreativeId',
                              'hopfeed.hopfeedApplicationPayout as hopfeed_hopfeedApplicationPayout',
                              'hopfeed.hopfeedVendorPayout as hopfeed_hopfeedVendorPayout',
                              'upsell.upsellOriginalReceipt as upsell_upsellOriginalReceipt',
                              'upsell.upsellFlowId as upsell_upsellFlowId',
                              'upsell.upsellSession as upsell_upsellSession',
                              'upsell.upsellPath as upsell_upsellPath',
                              'vendorVariables.v1 as vendorVariables_v1',
                              'vendorVariables.v2 as vendorVariables_v2'
                         )
                        ->leftjoin('lineItems', 'lineItems.lnkid', '=', 'notifications.id')
                        ->leftjoin('billing', 'billing.lnkid', '=', 'notifications.id')
                        ->leftjoin('billing_address', 'billing_address.lnkid', '=', 'notifications.id')
                        ->leftjoin('shipping', 'shipping.lnkid', '=', 'notifications.id')
                        ->leftjoin('shipping_address', 'shipping_address.lnkid', '=', 'notifications.id')
                        ->leftjoin('trackingCodes', 'trackingCodes.lnkid', '=', 'notifications.id')
                        ->leftjoin('upsell', 'upsell.lnkid', '=', 'notifications.id')
                        ->leftjoin('vendorVariables', 'vendorVariables.lnkid', '=', 'notifications.id')
                        ->leftjoin('hopfeed', 'hopfeed.lnkid', '=', 'notifications.id')
                        ->orderby('notifications.id', 'desc')
                        ->get();

        return view('shipping.inventory', compact('inv')); 

    	//return view('shipping.raw')->with('raw', Notifications::all());

    }


}