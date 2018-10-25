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



                        </tr>
                      </thead>
                      <tbody>



                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                 

                              </tr>

          <!--               <tr>
                            <th colspan="3">No Records</th>
                        </tr>
           -->

                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection