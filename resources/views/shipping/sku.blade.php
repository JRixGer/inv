@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">SKU Inventory</div>

                <div class="card-body">

                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    

                    <table class="table table-sm">
                      <thead>
                        <tr>

                          <th scope="col">CB SKU </th>

                          <th scope="col">DESC</th>

                          <th scope="col">QTY</th>

                          <th scope="col">TYPE</th>

                          <th scope="col" colspan="2">ACTION</th>

                        </tr>
                      </thead>
                      <tbody>
                            
                            @if($skus->count() > 0)
                              @foreach($skus as $sku)
                              <tr>
                                <td>
                                  {{ $sku->prodCode }}
                                </td>
                                <td>
                                  {{ $sku->prodName }}
                                </td>
                                <td>
                                  {{ $sku->prodQty }}
                                </td>
                                <td>
                                  {{ $sku->prodType }}
                                </td>
                                <td>
                                  <a class="btn btn-sm btn-info">Edit</a>
                                </td>
                                <td>
                                  <a class="btn btn-sm btn-warning">Delete</a>
                                </td>
                              </tr>
                              @endforeach
                            @else
                            <tr>
                              <th colspan="3">No Records</th>
                            </tr>
                            @endif
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection