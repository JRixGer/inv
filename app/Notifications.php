<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
   
    use Sortable;
	public $sortable = [
	'id',
	'dt',
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

	protected $table = 'vw_notification';

	// Select notifications.id as id,
	// DATE_FORMAT(notifications.dt, "%M %d %Y") as dt,
	// notifications.vendor as notifications_vendor,
	// notifications.transactionTime as notifications_transactionTime,
	// notifications.receipt as notifications_receipt,
	// notifications.transactionType as notifications_transactionType,     
	// billing.firstName as billing_firstName,
	// billing.lastName as billing_lastName,
	// billing.fullName as billing_fullName,
	// billing.phoneNumber as billing_phoneNumber,
	// billing.email as billing_email,
	// billing_address.state as billing_state,
	// billing_address.postalCode as billing_postalCode,
	// billing_address.country as billing_country,
	// shipping.firstName as shipping_firstName,
	// shipping.lastName as shipping_lastName,
	// shipping.fullName as shipping_fullName,
	// shipping.phoneNumber as shipping_phoneNumber,
	// shipping.email as shipping_email,
	// shipping_address.address1 as shipping_address1,
	// shipping_address.address2 as shipping_address2,
	// shipping_address.city as shipping_city,
	// shipping_address.county as shipping_county,
	// shipping_address.state as shipping_state,
	// shipping_address.postalCode as shipping_postalCode,
	// shipping_address.country as shipping_country,
	// lineItems.itemNo as lineItems_itemNo,
	// lineItems.productTitle as lineItems_productTitle,
	// lineItems.shippable as lineItems_shippable,
	// lineItems.recurring as lineItems_recurring,
	// lineItems.accountAmount as lineItems_accountAmount,
	// lineItems.quantity as lineItems_quantity,
	// lineItems.downloadUrl as lineItems_downloadUrl,
	// lineItems.productPrice as lineItems_productPrice,
	// lineItems.productDiscount as lineItems_productDiscount,
	// lineItems.taxAmount as lineItems_taxAmount,
	// lineItems.shippingAmount as lineItems_shippingAmount,
	// lineItems.shippingLiable as lineItems_shippingLiable,
	// lineItems.paymentsProcessed as lineItems_paymentsProcessed,
	// lineItems.paymentsRemaining as lineItems_paymentsRemaining,
	// lineItems.nextPaymentDate as lineItems_nextPaymentDate,
	// lineItems.affiliatePayout as lineItems_affiliatePayout,
	// lineItems.lineItemType as lineItems_lineItemType,
	// notifications.affiliate as notifications_affiliate,
	// notifications.role as notifications_role,
	// notifications.totalAccountAmount as notifications_totalAccountAmount,
	// notifications.paymentMethod as notifications_paymentMethod,
	// notifications.totalOrderAmount as notifications_totalOrderAmount,
	// notifications.totalTaxAmount as notifications_totalTaxAmount,
	// notifications.totalShippingAmount as notifications_totalShippingAmount,
	// notifications.currency as notifications_currency,
	// notifications.orderLanguage as notifications_orderLanguage,
	// notifications.version as notifications_version,
	// notifications.attemptCount as notifications_attemptCount,     
	// trackingCodes.trackingCodes as trackingCodes_trackingCodes,
	// hopfeed.hopfeedClickId as hopfeed_hopfeedClickId,
	// hopfeed.hopfeedApplicationId as hopfeed_hopfeedApplicationId,
	// hopfeed.hopfeedCreativeId as hopfeed_hopfeedCreativeId,
	// hopfeed.hopfeedApplicationPayout as hopfeed_hopfeedApplicationPayout,
	// hopfeed.hopfeedVendorPayout as hopfeed_hopfeedVendorPayout,
	// upsell.upsellOriginalReceipt as upsell_upsellOriginalReceipt,
	// upsell.upsellFlowId as upsell_upsellFlowId,
	// upsell.upsellSession as upsell_upsellSession,
	// upsell.upsellPath as upsell_upsellPath,
	// vendorVariables.v1 as vendorVariables_v1,
	// vendorVariables.v2 as vendorVariables_v2
	// FROM notifications
	// left join lineItems on lineItems.lnkid = notifications.id
	// left join billing on billing.lnkid = notifications.id
	// left join billing_address on billing_address.lnkid = notifications.id
	// left join shipping on shipping.lnkid = notifications.id
	// left join shipping_address on shipping_address.lnkid = notifications.id
	// left join trackingCodes on trackingCodes.lnkid = notifications.id
	// left join upsell on upsell.lnkid = notifications.id
	// left join vendorVariables on vendorVariables.lnkid = notifications.id
	// left join hopfeed on hopfeed.lnkid = notifications.id
	// WHERE notifications.vendor = 'totalpat' AND notifications.transactionType <> 'TEST' AND notifications.transactionType <> 
	// 'TEST_SALE' order by notifications.id desc


    public function lineitems()
    {
    	return $this->hasMany('App\lineitems');
    }

}
