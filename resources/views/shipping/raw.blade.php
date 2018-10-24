@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">INS Raw Data</div>

                <div class="card-body">
                  <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll">
                     <table class="table table-sm" border="1">
                      <thead>
                        <tr>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_vendor'))?></th>
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
                        </tr>
                      </thead>
                      <tbody>



                        @if($raw->count() > 0)
                            @foreach($raw as $rawnoti)
                            <tr>
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
