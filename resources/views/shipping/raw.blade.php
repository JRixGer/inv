@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">INS Raw Data</div>
                <div class="card-body">
                  <!-- <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll"> -->
                  <div style="max-width:auto; overflow: scroll;" class="horiz-scroll">
                     <table class="table table-sm" border="1">
                      <thead>
                        <tr>
                          <th scope="col">@sortablelink('id','ID')</th>
                          <th scope="col">@sortablelink('notifications_vendor',str_replace('_', ' ', 'notifications_vendor'))</th>
                          <th scope="col">@sortablelink('dt',str_replace('_', ' ', 'Date'))</th>
                          <th scope="col">@sortablelink('notifications_receipt',str_replace('_', ' ', 'notifications_receipt'))</th>
                          <th scope="col">@sortablelink('notifications_transactionType',str_replace('_', ' ', 'notifications_transactionType'))</th>     
                          <th scope="col" style="background-color: rgba(252, 255, 144, 0.51)">@sortablelink('billing_firstName',str_replace('_', ' ', 'billing_firstName'))</th>
                          <th scope="col" style="background-color: rgba(252, 255, 144, 0.51)">@sortablelink('billing_lastName',str_replace('_', ' ', 'billing_lastName'))</th>
                          <th scope="col" class="highlight">@sortablelink('billing_fullName',str_replace('_', ' ', 'billing_fullName'))</th>
                          <th scope="col">@sortablelink('billing_phoneNumber',str_replace('_', ' ', 'billing_phoneNumber'))</th>
                          <th scope="col" class="highlight" style="background-color: rgba(252, 255, 144, 0.51)">@sortablelink('billing_email',str_replace('_', ' ', 'billing_email'))</th>
                          <th scope="col">@sortablelink('billing_state',str_replace('_', ' ', 'billing_state'))</th>

                          <th scope="col">@sortablelink('billing_postalCode',str_replace('_', ' ', 'billing_postalCode'))</th>
                          <th scope="col">@sortablelink('billing_country',str_replace('_', ' ', 'billing_country'))</th>
                          <th scope="col">@sortablelink('shipping_firstName',str_replace('_', ' ', 'shipping_firstName'))</th>
                          <th scope="col">@sortablelink('shipping_lastName',str_replace('_', ' ', 'shipping_lastName'))</th>
                          <th scope="col">@sortablelink('shipping_fullName',str_replace('_', ' ', 'shipping_fullName'))</th>
                          <th scope="col">@sortablelink('shipping_phoneNumber',str_replace('_', ' ', 'shipping_phoneNumber'))</th>

                          <th scope="col" class="highlight">@sortablelink('shipping_email',str_replace('_', ' ', 'shipping_email'))</th>
                          <th scope="col">@sortablelink('shipping_address1',str_replace('_', ' ', 'shipping_address1'))</th>
                          <th scope="col">@sortablelink('shipping_address2',str_replace('_', ' ', 'notifications_vendor'))</th>
                          <th scope="col">@sortablelink('shipping_city',str_replace('_', ' ', 'shipping_city'))</th>
                          <th scope="col">@sortablelink('shipping_county',str_replace('_', ' ', 'shipping_county'))</th>
                          <th scope="col">@sortablelink('shipping_state',str_replace('_', ' ', 'shipping_state'))</th>
                          <th scope="col">@sortablelink('shipping_postalCode',str_replace('_', ' ', 'shipping_postalCode'))</th>

                          <th scope="col">@sortablelink('shipping_country',str_replace('_', ' ', 'shipping_country'))</th>
                          <th scope="col" style="background-color: rgba(252, 255, 144, 0.51)">@sortablelink('lineItems_itemNo',str_replace('_', ' ', 'lineItems_itemNo'))</th>
                          <th scope="col" style="background-color: rgba(252, 255, 144, 0.51)">@sortablelink('lineItems_productTitle',str_replace('_', ' ', 'lineItems_productTitle'))</th>
                          <th scope="col">@sortablelink('lineItems_shippable',str_replace('_', ' ', 'lineItems_shippable'))</th>
                          <th scope="col">@sortablelink('lineItems_recurring',str_replace('_', ' ', 'lineItems_recurring'))</th>
                          <th scope="col">@sortablelink('lineItems_accountAmount',str_replace('_', ' ', 'lineItems_accountAmount'))</th>
                          <th scope="col">@sortablelink('lineItems_quantity',str_replace('_', ' ', 'lineItems_quantity'))</th>
                          <th scope="col">@sortablelink('lineItems_productPrice',str_replace('_', ' ', 'lineItems_productPrice'))</th>
                          <th scope="col">@sortablelink('lineItems_productDiscount',str_replace('_', ' ', 'lineItems_productDiscount'))</th>
                          <th scope="col">@sortablelink('lineItems_taxAmount',str_replace('_', ' ', 'lineItems_taxAmount'))</th>
                          <th scope="col">@sortablelink('lineItems_shippingAmount',str_replace('_', ' ', 'lineItems_shippingAmount'))</th>
                          <th scope="col">@sortablelink('lineItems_shippingLiable',str_replace('_', ' ', 'lineItems_shippingLiable'))</th>
                          <th scope="col">@sortablelink('lineItems_paymentsProcessed',str_replace('_', ' ', 'lineItems_paymentsProcessed'))</th>
                          <th scope="col">@sortablelink('lineItems_paymentsRemaining',str_replace('_', ' ', 'lineItems_paymentsRemaining'))</th>
                          <th scope="col">@sortablelink('lineItems_nextPaymentDate',str_replace('_', ' ', 'lineItems_nextPaymentDate'))</th>
                          <th scope="col">@sortablelink('lineItems_affiliatePayout',str_replace('_', ' ', 'lineItems_affiliatePayout'))</th>
                          <th scope="col">@sortablelink('lineItems_lineItemType',str_replace('_', ' ', 'lineItems_lineItemType'))</th>
                          <th scope="col">@sortablelink('notifications_affiliate',str_replace('_', ' ', 'notifications_affiliate'))</th>
                          <th scope="col">@sortablelink('notifications_role',str_replace('_', ' ', 'notifications_role'))</th>
                          <th scope="col">@sortablelink('notifications_totalAccountAmount',str_replace('_', ' ', 'notifications_totalAccountAmount'))</th>
                          <th scope="col">@sortablelink('notifications_paymentMethod',str_replace('_', ' ', 'notifications_paymentMethod'))</th>
                          <th scope="col">@sortablelink('notifications_totalOrderAmount',str_replace('_', ' ', 'notifications_totalOrderAmount'))</th>
                          <th scope="col">@sortablelink('notifications_totalTaxAmount',str_replace('_', ' ', 'notifications_totalTaxAmount'))</th>
                          <th scope="col">@sortablelink('notifications_totalShippingAmount',str_replace('_', ' ', 'notifications_totalShippingAmount'))</th>
                          <th scope="col">@sortablelink('notifications_currency',str_replace('_', ' ', 'notifications_currency'))</th>
                          <th scope="col">@sortablelink('notifications_orderLanguage',str_replace('_', ' ', 'notifications_orderLanguage'))</th>
                          <th scope="col">@sortablelink('notifications_version',str_replace('_', ' ', 'notifications_version'))</th>
                          <th scope="col">@sortablelink('notifications_attemptCount',str_replace('_', ' ', 'notifications_attemptCount'))</th>     
                          <th scope="col">@sortablelink('trackingCodes_trackingCodes',str_replace('_', ' ', 'trackingCodes_trackingCodes'))</th>
                          <th scope="col">@sortablelink('hopfeed_hopfeedClickId',str_replace('_', ' ', 'hopfeed_hopfeedClickId'))</th>
                          <th scope="col">@sortablelink('hopfeed_hopfeedApplicationId',str_replace('_', ' ', 'hopfeed_hopfeedApplicationId'))</th>
                          <th scope="col">@sortablelink('hopfeed_hopfeedCreativeId',str_replace('_', ' ', 'hopfeed_hopfeedCreativeId'))</th>
                          <th scope="col">@sortablelink('hopfeed_hopfeedApplicationPayout',str_replace('_', ' ', 'hopfeed_hopfeedApplicationPayout'))</th>
                          <th scope="col">@sortablelink('hopfeed_hopfeedVendorPayout',str_replace('_', ' ', 'hopfeed_hopfeedVendorPayout'))</th>
                          <th scope="col">@sortablelink('upsell_upsellOriginalReceipt',str_replace('_', ' ', 'upsell_upsellOriginalReceipt'))</th>
                          <th scope="col">@sortablelink('upsell_upsellFlowId',str_replace('_', ' ', 'upsell_upsellFlowId'))</th>
                          <th scope="col">@sortablelink('upsell_upsellSession',str_replace('_', ' ', 'upsell_upsellSession'))</th>
                          <th scope="col">@sortablelink('upsell_upsellPath',str_replace('_', ' ', 'upsell_upsellPath'))</th>
                          <th scope="col">@sortablelink('vendorVariables_v1',str_replace('_', ' ', 'vendorVariables_v1'))</th>
                          <th scope="col">@sortablelink('lineItems_downloadUrl',str_replace('_', ' ', 'lineItems_downloadUrl'))</th>

<!--                         <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_vendor'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_transactionDate'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_receipt'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_transactionType'))?></th>     
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_firstName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_lastName'))?></th>
                        <th scope="col" class="highlight"><?=ucfirst(str_replace('_', ' ', 'billing_fullName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_phoneNumber'))?></th>
                        <th scope="col" class="highlight"><?=ucfirst(str_replace('_', ' ', 'billing_email'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_state'))?></th>

                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_postalCode'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_country'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_firstName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_lastName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_fullName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_phoneNumber'))?></th>
                        <th scope="col" class="highlight"><?=ucfirst(str_replace('_', ' ', 'shipping_email'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_address1'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_address2'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_city'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_county'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_state'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_postalCode'))?></th>

                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'shipping_country'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_itemNo'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_productTitle'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_shippable'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_recurring'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_accountAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_quantity'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_lineItemType'))?></th>

                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_productPrice'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_productDiscount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_taxAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_shippingAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_shippingLiable'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_paymentsProcessed'))?></th>

                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_paymentsRemaining'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_nextPaymentDate'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_affiliatePayout'))?></th>


                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_affiliate'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_role'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_totalAccountAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_paymentMethod'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_totalOrderAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_totalTaxAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_totalShippingAmount'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_currency'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_orderLanguage'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_version'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_attemptCount'))?></th>     
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'trackingCodes_trackingCodes'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'hopfeed_hopfeedClickId '))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'hopfeed_hopfeedApplicationId'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'hopfeed_hopfeedCreativeId'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'hopfeed_hopfeedApplicationPayout'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'hopfeed_hopfeedVendorPayout'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'upsell_upsellOriginalReceipt'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'upsell_upsellFlowId'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'upsell_upsellSession'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'upsell_upsellPath'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'vendorVariables_v1'))?></th>                          
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_downloadUrl'))?></th>
 -->

                        </tr>
                      </thead>
                      <tbody>
                        @if($raw->count() > 0)
                            @foreach($raw as $rawnoti)
                            <tr>
                              <td>{{ $rawnoti->id }}</td>
                              <td>{{ $rawnoti->notifications_vendor }}</td>
                              <td>{{ $rawnoti->dt }}</td>
                              <td>{{ $rawnoti->notifications_receipt }}</td>
                              <td>{{ $rawnoti->notifications_transactionType }}</td>     
                              <td>{{ $rawnoti->billing_firstName }}</td>
                              <td>{{ $rawnoti->billing_lastName }}</td>
                              <td>{{ $rawnoti->billing_fullName }}</td>
                              <td>{{ $rawnoti->billing_phoneNumber }}</td>
                              <td>{{ $rawnoti->billing_email }}</td>
                              <td>{{ $rawnoti->billing_state }}</td>
                              <td>{{ $rawnoti->billing_postalCode }}</td>
                              <td>{{ $rawnoti->billing_country }}</td>
                              <td>{{ $rawnoti->shipping_firstName }}</td>
                              <td>{{ $rawnoti->shipping_lastName }}</td>
                              <td>{{ $rawnoti->shipping_fullName }}</td>
                              <td>{{ $rawnoti->shipping_phoneNumber }}</td>
                              <td>{{ $rawnoti->shipping_email }}</td>
                              <td>{{ $rawnoti->shipping_address1 }}</td>
                              <td>{{ $rawnoti->shipping_address2 }}</td>
                              <td>{{ $rawnoti->shipping_city }}</td>
                              <td>{{ $rawnoti->shipping_county }}</td>
                              <td>{{ $rawnoti->shipping_state }}</td>
                              <td>{{ $rawnoti->shipping_postalCode }}</td>
                              <td>{{ $rawnoti->shipping_country  }}</td>
                              <td>{{ $rawnoti->lineItems_itemNo }}</td>
                              <td>{{ $rawnoti->lineItems_productTitle }}</td>
                              <td>{{ $rawnoti->lineItems_shippable }}</td>
                              <td>{{ $rawnoti->lineItems_recurring }}</td>
                              <td>{{ $rawnoti->lineItems_accountAmount }}</td>
                              <td>{{ $rawnoti->lineItems_quantity }}</td>
                              <td>{{ $rawnoti->lineItems_lineItemType }}</td>


                              <td>{{ $rawnoti->lineItems_productPrice }}</td>
                              <td>{{ $rawnoti->lineItems_productDiscount }}</td>
                              <td>{{ $rawnoti->lineItems_taxAmount }}</td>
                              <td>{{ $rawnoti->lineItems_shippingAmount }}</td>
                              <td>{{ $rawnoti->lineItems_shippingLiable }}</td>
                              <td>{{ $rawnoti->lineItems_paymentsProcessed }}</td>
                              <td>{{ $rawnoti->lineItems_paymentsRemaining }}</td>
                              <td>{{ $rawnoti->lineItems_nextPaymentDate }}</td>
                              <td>{{ $rawnoti->lineItems_affiliatePayout }}</td>

                              <td>{{ $rawnoti->notifications_affiliate }}</td>
                              <td>{{ $rawnoti->notifications_role }}</td>
                              <td>{{ $rawnoti->notifications_totalAccountAmount }}</td>
                              <td>{{ $rawnoti->notifications_paymentMethod }}</td>
                              <td>{{ $rawnoti->notifications_totalOrderAmount }}</td>
                              <td>{{ $rawnoti->notifications_totalTaxAmount }}</td>
                              <td>{{ $rawnoti->notifications_totalShippingAmount }}</td>
                              <td>{{ $rawnoti->notifications_currency }}</td>
                              <td>{{ $rawnoti->notifications_orderLanguage }}</td>
                              <td>{{ $rawnoti->notifications_version }}</td>
                              <td>{{ $rawnoti->notifications_attemptCount }}</td>     
                              <td>{{ $rawnoti->trackingCodes_trackingCodes }}</td>
                              <td>{{ $rawnoti->hopfeed_hopfeedClickId  }}</td>
                              <td>{{ $rawnoti->hopfeed_hopfeedApplicationId }}</td>
                              <td>{{ $rawnoti->hopfeed_hopfeedCreativeId }}</td>
                              <td>{{ $rawnoti->hopfeed_hopfeedApplicationPayout }}</td>
                              <td>{{ $rawnoti->hopfeed_hopfeedVendorPayout }}</td>
                              <td>{{ $rawnoti->upsell_upsellOriginalReceipt }}</td>
                              <td>{{ $rawnoti->upsell_upsellFlowId }}</td>
                              <td>{{ $rawnoti->upsell_upsellSession }}</td>
                              <td>{{ $rawnoti->upsell_upsellPath }}</td>
                              <td>{{ $rawnoti->vendorVariables_v1 }}</td>
                              <td>{{ $rawnoti->lineItems_downloadUrl }}</td>


                          </tr>
                            @endforeach
                          <tr>
                            <td colspan="100">
                              {{ $raw->appends(\Request::except('page'))->render() }}
                            </td>
                          </tr>
                          
                        @else
                        <tr>
                            <th colspan="100">No Records</th>
                        </tr>
                        @endif

                      </tbody>
                    </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
