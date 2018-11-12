<?php

  $datenow = date('Y-m-d H:i:s');
  $dt_last1 = date('m/d', strtotime($datenow));

  $dt_last2 = strtotime('-1 day' , strtotime($datenow));
  $dt_last2 = date('m/d', $dt_last2);

  $dt_last3 = strtotime('-2 day' , strtotime($datenow));
  $dt_last3 = date('m/d', $dt_last3);

  $dt_last4 = strtotime('-3 day' , strtotime($datenow));
  $dt_last4 = date('m/d', $dt_last4);

  $dt_last5 = strtotime('-4 day' , strtotime($datenow));
  $dt_last5 = date('m/d', $dt_last5);

  $dt_last6 = strtotime('-5 day' , strtotime($datenow));
  $dt_last6 = date('m/d', $dt_last6);

  $dt_last7 = strtotime('-6 day' , strtotime($datenow));
  $dt_last7 = date('m/d', $dt_last7);

  $dt_last8 = strtotime('-7 day' , strtotime($datenow));
  $dt_last8 = date('m/d', $dt_last8);

  $dt_last9 = strtotime('-8 day' , strtotime($datenow));
  $dt_last9 = date('m/d', $dt_last9);

  $dt_last10 = strtotime('-9 day' , strtotime($datenow));
  $dt_last10 = date('m/d', $dt_last10);

  $dt_last11 = strtotime('-10 day' , strtotime($datenow));
  $dt_last11 = date('m/d', $dt_last11);

  $dt_last12 = strtotime('-11 day' , strtotime($datenow));
  $dt_last12 = date('m/d', $dt_last12);

  $dt_last13 = strtotime('-12 day' , strtotime($datenow));
  $dt_last13 = date('m/d', $dt_last13);

  $dt_last14 = strtotime('-13 day' , strtotime($datenow));
  $dt_last14 = date('m/d', $dt_last14);

?>
@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">Inventory Consolidated</div>
                <div class="card-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <!-- <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll"> -->
                    <div style="max-width:auto; overflow: scroll;" class="horiz-scroll">
                    <table class="table table-sm">
                      <thead>
                        <tr>

                            <th scope="col">SKU</th>
                            <th scope="col">Product Name</th>
                            <th scope="col" style="color: rgb(0, 85, 255);">Bal</th>

                            <th scope="col" style="color: rgb(255, 0, 0);">30D</th>
                            <th scope="col" style="color: rgb(255, 0, 0);">14D</th>
                            <td scope="col" style="background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last1 }}</td>
                            <th scope="col">{{ $dt_last2 }}</th>
                            <th scope="col">{{ $dt_last3 }}</th>
                            <th scope="col">{{ $dt_last4 }}</th>
                            <th scope="col">{{ $dt_last5 }}</th>
                            <th scope="col">{{ $dt_last6 }}</th>
                            <th scope="col">{{ $dt_last7 }}</th>
                            <th scope="col" style="color: rgb(255, 0, 0);">7D</th>
                            <th scope="col">{{ $dt_last8 }}</th>
                            <th scope="col">{{ $dt_last9 }}</th>
                            <th scope="col">{{ $dt_last10 }}</th>
                            <th scope="col">{{ $dt_last11 }}</th>
                            <th scope="col">{{ $dt_last12 }}</th>
                            <th scope="col">{{ $dt_last13 }}</th>
                            <th scope="col">{{ $dt_last14 }}</th>

                        </tr>
                      </thead>
                      <tbody>

                        @if($daily_ship->count() > 0)
                            @foreach($daily_ship as $row)

                            <?php 
                            $d07 = ($row->q8+$row->q9+$row->q10+$row->q11+$row->q12+$row->q13+$row->q14);
                            $d14 = ($row->q1+$row->q2+$row->q3+$row->q4+$row->q5+$row->q6+$row->q7)+$d07; 
                            $sku_onhand = is_numeric($row->onhand)? $row->onhand:0;
                            $sku_sold = is_numeric($row->sold)? $row->sold:0;
                            $running_bal = $sku_onhand - $sku_sold;

                            $d07 = ($d07=="" || $d07==0)? "":$d07; 
                            $d14 = ($d14=="" || $d14==0)? "":$d14; 

                            $q1 = ($row->q1=="" || $row->q1==0)? "":$row->q1; 
                            $q2 = ($row->q2=="" || $row->q2==0)? "":$row->q2;
                            $q3 = ($row->q3=="" || $row->q3==0)? "":$row->q3;
                            $q4 = ($row->q4=="" || $row->q4==0)? "":$row->q4;
                            $q5 = ($row->q5=="" || $row->q5==0)? "":$row->q5;
                            $q6 = ($row->q6=="" || $row->q6==0)? "":$row->q6;
                            $q7 = ($row->q7=="" || $row->q7==0)? "":$row->q7;
                            $q8 = ($row->q8=="" || $row->q8==0)? "":$row->q8;
                            $q9 = ($row->q9=="" || $row->q9==0)? "":$row->q9;
                            $q10 = ($row->q10=="" || $row->q10==0)? "":$row->q10;
                            $q11 = ($row->q11=="" || $row->q11==0)? "":$row->q11;
                            $q12 = ($row->q12=="" || $row->q12==0)? "":$row->q12;
                            $q13 = ($row->q13=="" || $row->q13==0)? "":$row->q13;
                            $q14 = ($row->q14=="" || $row->q14==0)? "":$row->q14;
                            $q30 = ($row->q30=="" || $row->q30==0)? "":$row->q30;

                            $critical = "";
                            if($running_bal < 50)
                              $critical = "style='background-color:#ff00003d'";                              
                            ?>
                            
                            <tr>
                                <td>{{ $row->prodCode_grp }}</td>
                                <td>{{ $row->prodName_grp }}</td>

 
                                <td <?php echo $critical ?>>{{ number_format($running_bal) }}</td>
  
                                <td>{{ $sku_onhand }}</td>
                                <td>{{ $sku_sold }}</td>

                                <td>{{ $q30 }}</td>
                                <td>{{ $d14 }}</td>
                                <td style="background-color: rgba(220, 250, 215, 0.35)">{{ $q1 }}</td>
                                <td>{{ $q2 }}</td>
                                <td>{{ $q3 }}</td>
                                <td>{{ $q4 }}</td>
                                <td>{{ $q5 }}</td>
                                <td>{{ $q6 }}</td>
                                <td>{{ $q7 }}</td>

                                <td>{{ $d07 }}</td>
                                <td>{{ $q8 }}</td>
                                <td>{{ $q9 }}</td>
                                <td>{{ $q10 }}</td>
                                <td>{{ $q11 }}</td>
                                <td>{{ $q12 }}</td>
                                <td>{{ $q13 }}</td>
                                <td>{{ $q14 }}</td>

                              </tr>
                            @endforeach
                          <tr>
                            <td colspan="20">
                              {{ $daily_ship->links() }}
                            </td>
                          </tr>
                        @else
                        <tr>
                            <td colspan="20">No Records</td>
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