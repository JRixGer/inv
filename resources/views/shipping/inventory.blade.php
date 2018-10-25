<?php


  $datenow = date('Y-m-d H:i:s');
  //$datenow = date_create($datenow);

  $dt_last1 = strtotime('-1 day' , strtotime($datenow));
  $dt_last1 = date('m/d', $dt_last1);

  $dt_last2 = strtotime('-2 day' , strtotime($datenow));
  $dt_last2 = date('m/d', $dt_last2);

  $dt_last3 = strtotime('-3 day' , strtotime($datenow));
  $dt_last3 = date('m/d', $dt_last3);

  $dt_last4 = strtotime('-4 day' , strtotime($datenow));
  $dt_last4 = date('m/d', $dt_last4);

  $dt_last5 = strtotime('-5 day' , strtotime($datenow));
  $dt_last5 = date('m/d', $dt_last5);

  $dt_last6 = strtotime('-6 day' , strtotime($datenow));
  $dt_last6 = date('m/d', $dt_last6);

  $dt_last7 = strtotime('-7 day' , strtotime($datenow));
  $dt_last7 = date('m/d', $dt_last7);

  $dt_last8 = strtotime('-8 day' , strtotime($datenow));
  $dt_last8 = date('m/d', $dt_last8);

  $dt_last9 = strtotime('-9 day' , strtotime($datenow));
  $dt_last9 = date('m/d', $dt_last9);

  $dt_last10 = strtotime('-10 day' , strtotime($datenow));
  $dt_last10 = date('m/d', $dt_last10);

  $dt_last11 = strtotime('-11 day' , strtotime($datenow));
  $dt_last11 = date('m/d', $dt_last11);

  $dt_last12 = strtotime('-12 day' , strtotime($datenow));
  $dt_last12 = date('m/d', $dt_last12);

  $dt_last13 = strtotime('-13 day' , strtotime($datenow));
  $dt_last13 = date('m/d', $dt_last13);

  $dt_last14 = strtotime('-14 day' , strtotime($datenow));
  $dt_last14 = date('m/d', $dt_last14);

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

                          <th scope="col" style="color: rgb(0, 85, 255);">BAL</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">30D</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">14D</th>

                          <th scope="col">{{$dt_last1}}</th>

                          <th scope="col">{{$dt_last2}}</th>

                          <th scope="col">{{$dt_last3}}</th>

                          <th scope="col">{{$dt_last4}}</th>

                          <th scope="col">{{$dt_last5}}</th>

                          <th scope="col">{{$dt_last6}}</th>

                          <th scope="col">{{$dt_last7}}</th>

                          <th scope="col" style="color: rgb(255, 0, 0);">7D</th>

                          <th scope="col">{{$dt_last8}}</th>

                          <th scope="col">{{$dt_last9}}</th>

                          <th scope="col">{{$dt_last10}}</th>

                          <th scope="col">{{$dt_last11}}</th>

                          <th scope="col">{{$dt_last12}}</th>

                          <th scope="col">{{$dt_last13}}</th>

                          <th scope="col">{{$dt_last14}}</th>


                        </tr>
                      </thead>
                      <tbody>


                        @if($daily_ship->count() > 0)
                            @foreach($daily_ship as $row)

                            <?php 
                            $d07 = ($row->qty08+$row->qty09+$row->qty10+$row->qty11+$row->qty12+$row->qty13+$row->qty14);
                            $d14 = ($row->qty01+$row->qty02+$row->qty03+$row->qty04+$row->qty05+$row->qty06+$row->qty07)+$d07; 
                            ?>
                            
                            <tr>
                                <td>{{ $row->item_number }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->prodQty - ($d14 + $d07) }}</td>
                                <td>{{ $row->qty30 }}</td>

                                <td>{{ $d14 }}</td>
                                <td>{{ $row->qty01 }}</td>
                                <td>{{ $row->qty02 }}</td>
                                <td>{{ $row->qty03 }}</td>
                                <td>{{ $row->qty04 }}</td>
                                <td>{{ $row->qty05 }}</td>
                                <td>{{ $row->qty06 }}</td>
                                <td>{{ $row->qty07 }}</td>

                                <td>{{ $d07 }}</td>
                                <td>{{ $row->qty08 }}</td>
                                <td>{{ $row->qty09 }}</td>
                                <td>{{ $row->qty10 }}</td>
                                <td>{{ $row->qty11 }}</td>
                                <td>{{ $row->qty12 }}</td>
                                <td>{{ $row->qty13 }}</td>
                                <td>{{ $row->qty14 }}</td>

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