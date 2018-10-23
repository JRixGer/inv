<?php
  $date9_9 = date('Y-m-d H:i:s');
  $date9=date_create($date9_9);
  $date10 = date_format($date9,"Y-m-d");
  $dt_today = date_format($date9, "m/d");
  $dt_yesterday = strtotime('-1 day' , strtotime($dt_today));
  $dt_yesterday = date('m/d', $dt_yesterday);
  $dt_lasttwo = strtotime('-2 day' , strtotime($dt_today));
  $dt_lasttwo = date('m/d', $dt_lasttwo);
  $dt_last3 = strtotime('-3 day' , strtotime($dt_today));
  $dt_last3 = date('m/d', $dt_last3);
  $dt_last4 = strtotime('-4 day' , strtotime($dt_today));
  $dt_last4 = date('m/d', $dt_last4);
  $dt_last5 = strtotime('-5 day' , strtotime($dt_today));
  $dt_last5 = date('m/d', $dt_last5);
  $dt_last6 = strtotime('-6 day' , strtotime($dt_today));
  $dt_last6 = date('m/d', $dt_last6);
  $dt_last7 = strtotime('-7 day' , strtotime($dt_today));
  $dt_last7 = date('m/d', $dt_last7);
  $dt_last8 = strtotime('-8 day' , strtotime($dt_today));
  $dt_last8 = date('m/d', $dt_last8);
?>
@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">Inventory</div>

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

                          <th scope="col">BAL</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">{{$dt_today}}</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">30D</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">14D</th>

                          <th scope="col">{{$dt_yesterday}}</th>

                          <th scope="col">{{$dt_lasttwo}}</th>

                          <th scope="col">{{$dt_last3}}</th>

                          <th scope="col">{{$dt_last4}}</th>

                          <th scope="col">{{$dt_last5}}</th>

                          <th scope="col">{{$dt_last6}}</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">7D</th>

                          <th scope="col">{{$dt_last7}}</th>

                          <th scope="col">{{$dt_last8}}</th>



                        </tr>
                      </thead>
                      <tbody>


                        @if($daily_ship->count() > 0)
                            @foreach($daily_ship as $row)
                            <tr>
                                <td>{{ $row->item_number }}</td>
                                <td>{{ $row->description }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $row->qty30 }}</td>
                                <td>{{ $row->qty14 }}</td>

                                <td>{{ $row->qty01 }}</td>
                                <td>{{ $row->qty02 }}</td>
                                <td>{{ $row->qty03 }}</td>
                                <td>{{ $row->qty04 }}</td>
                                <td>{{ $row->qty05 }}</td>
                                <td>{{ $row->qty06 }}</td>

                                <td>{{ $row->qty7 }}</td>

                                <td>{{ $row->qty07 }}</td>
                                <td>{{ $row->qty08 }}</td>

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