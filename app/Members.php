<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
   
    use Sortable;
	public $sortable = [
	'id',
    'dt',
    'transactionTime',
	'notifications_vendor',
	'notifications_transactionTime',
	'notifications_receipt',
	'notifications_transactionType',     
	'billing_firstName',
	'billing_lastName',
	'billing_fullName',
	'billing_phoneNumber',
	'billing_email',
	'billing_state',
	'billing_postalCode',
	'billing_country',
	'shipping_firstName',
	'shipping_lastName',
	'shipping_fullName',
	'shipping_phoneNumber',
	'shipping_email',
	'shipping_address1',
	'shipping_address2',
	'shipping_city',
	'shipping_county',
	'shipping_state',
	'shipping_postalCode',
	'shipping_country',
	'lineItems_itemNo',
	'lineItems_productTitle',
	'lineItems_shippable',
	'lineItems_recurring',
	'lineItems_accountAmount',
	'lineItems_quantity',
	'lineItems_downloadUrl',
	'lineItems_productPrice',
	'lineItems_productDiscount',
	'lineItems_taxAmount',
	'lineItems_shippingAmount',
	'lineItems_shippingLiable',
	'lineItems_paymentsProcessed',
	'lineItems_paymentsRemaining',
	'lineItems_nextPaymentDate',
	'lineItems_affiliatePayout',
	'lineItems_lineItemType',
	'notifications_affiliate',
	'notifications_role',
	'notifications_totalAccountAmount',
	'notifications_paymentMethod',
	'notifications_totalOrderAmount',
	'notifications_totalTaxAmount',
	'notifications_totalShippingAmount',
	'notifications_currency',
	'notifications_orderLanguage',
	'notifications_version',
	'notifications_attemptCount',     
	'trackingCodes_trackingCodes',
	'hopfeed_hopfeedClickId',
	'hopfeed_hopfeedApplicationId',
	'hopfeed_hopfeedCreativeId',
	'hopfeed_hopfeedApplicationPayout',
	'hopfeed_hopfeedVendorPayout',
	'upsell_upsellOriginalReceipt',
	'upsell_upsellFlowId',
	'upsell_upsellSession',
	'upsell_upsellPath',
	'vendorVariables_v1',
	'vendorVariables_v2'
];

	protected $table = 'notifications';

    public function lineItems()
    {
    	return $this->hasMany('App\LineItems','lnkid','id');
    }

}
