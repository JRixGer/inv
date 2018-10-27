@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">Maropost Posting List</div>

                <div class="card-body">
                  <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll">
                     <table class="table table-sm" border="1">
                      <thead>
                        <tr>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_transactionDate'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_receipt'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_transactionType'))?></th>   
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'lineItems_itemNo'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'maropost_posted'))?></th>    
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_firstName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_lastName'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_phoneNumber'))?></th>
                        <th scope="col" class="highlight"><?=ucfirst(str_replace('_', ' ', 'billing_email'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_state'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_postalCode'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'billing_country'))?></th>
                        <th scope="col"><?=ucfirst(str_replace('_', ' ', 'notifications_affiliate'))?></th>
                        </tr>
                      </thead>
                      <tbody>



                        @if($maro->count() > 0)
                            @foreach($maro as $rawmaro)
                            <?php
                            $p = (($rawmaro->notifications_posted==1)? "<p style='color:BLUE'>Yes</p>":"<p style='color:RED'>No</p>");
                            $url = '<a href="'.$rawmaro->lineItems_downloadUrl.'" target="blank_">URL<a>';
                            ?>
                            <tr>
                              <td>{{ $rawmaro->dt }}</td>
                              <td>{{ $rawmaro->notifications_receipt }}</td>
                              <td>{{ $rawmaro->notifications_transactionType }}</td>    
                              <td>{{ $rawmaro->lineItems_itemNo }}</td>
                              <td><?php echo $p ?></td>     
                              <td>{{ $rawmaro->billing_firstName }}</td>
                              <td>{{ $rawmaro->billing_lastName }}</td>
                              <td>{{ $rawmaro->billing_phoneNumber }}</td>
                              <td>{{ $rawmaro->billing_email }}</td>
                              <td>{{ $rawmaro->billing_state }}</td>
                              <td>{{ $rawmaro->billing_postalCode }}</td>
                              <td>{{ $rawmaro->billing_country }}</td>
                              <td><?php echo $url ?></td>
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
