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

                            <th scope="col" style="border-bottom: 0px solid #ffffff;"> </th>
                            <th scope="col" style="border-bottom: 0px solid #ffffff;"> </th>
                            <th scope="col" style="color: rgb(0, 85, 255); border-bottom: 0px solid #ffffff;"></th>

                            <th scope="col" colspan="2" style="color: rgb(255, 0, 0); text-align: center;">30D</th>
                            <th scope="col" colspan="2" style="color: rgb(255, 0, 0); text-align: center;">14D</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last1 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last2 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last3 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last4 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last5 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last6 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last7 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">7D</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last8 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last9 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last10 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last11 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last12 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last13 }}</th>
                            <th scope="col" colspan="2" style="text-align: center;">{{ $dt_last14 }}</th>

                        </tr>
                        <tr>

                            <th scope="col" style="border-top: 0px solid #ffffff;">SKU</th>
                            <th scope="col" style="border-top: 0px solid #ffffff;">Product Name</th>
                            <th scope="col" style="border-top: 0px solid #ffffff;">Bal</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>

                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>
                            <th scope="col" style="text-align: center;">CB</th>
                            <th scope="col" style="text-align: center;">IS</th>

                        </tr>
                      </thead>
                      <tbody>

                        @if($daily_ship->count() > 0)
                            @foreach($daily_ship as $row)

                            <?php 
                            $d07 = ($row->q8+$row->q9+$row->q10+$row->q11+$row->q12+$row->q13+$row->q14);
                            $d14 = ($row->q1+$row->q2+$row->q3+$row->q4+$row->q5+$row->q6+$row->q7)+$d07; 

                            $d07_is = ($row->q8_is+$row->q9_is+$row->q10_is+$row->q11_is+$row->q12_is+$row->q13_is+$row->q14_is);
                            $d14_is = ($row->q1_is+$row->q2_is+$row->q3_is+$row->q4_is+$row->q5_is+$row->q6_is+$row->q7_is)+$d07_is; 

                            $sku_onhand = is_numeric($row->onhand)? $row->onhand:0;
                            $sku_sold = is_numeric($row->sold)? $row->sold:0;
                            $running_bal = $sku_onhand - $sku_sold;

                            $d07 = ($d07=="" || $d07==0)? "":$d07; 
                            $d14 = ($d14=="" || $d14==0)? "":$d14; 

                            $d07_is = ($d07_is=="" || $d07_is==0)? "":$d07_is; 
                            $d14_is = ($d14_is=="" || $d14_is==0)? "":$d14_is; 

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

                            $q1_is = ($row->q1_is=="" || $row->q1_is==0)? "":$row->q1_is; 
                            $q2_is = ($row->q2_is=="" || $row->q2_is==0)? "":$row->q2_is;
                            $q3_is = ($row->q3_is=="" || $row->q3_is==0)? "":$row->q3_is;
                            $q4_is = ($row->q4_is=="" || $row->q4_is==0)? "":$row->q4_is;
                            $q5_is = ($row->q5_is=="" || $row->q5_is==0)? "":$row->q5_is;
                            $q6_is = ($row->q6_is=="" || $row->q6_is==0)? "":$row->q6_is;
                            $q7_is = ($row->q7_is=="" || $row->q7_is==0)? "":$row->q7_is;
                            $q8_is = ($row->q8_is=="" || $row->q8_is==0)? "":$row->q8_is;
                            $q9_is = ($row->q9_is=="" || $row->q9_is==0)? "":$row->q9_is;
                            $q10_is = ($row->q10_is=="" || $row->q10_is==0)? "":$row->q10_is;
                            $q11_is = ($row->q11_is=="" || $row->q11_is==0)? "":$row->q11_is;
                            $q12_is = ($row->q12_is=="" || $row->q12_is==0)? "":$row->q12_is;
                            $q13_is = ($row->q13_is=="" || $row->q13_is==0)? "":$row->q13_is;
                            $q14_is = ($row->q14_is=="" || $row->q14_is==0)? "":$row->q14_is;
                            $q30_is = ($row->q30_is=="" || $row->q30_is==0)? "":$row->q30_is;

                            $critical = "";
                            if((int)$running_bal < 50)
                              $critical = "style='background-color:#ff00003d'";     

                            $sku_sold = ($sku_sold==0)? "":number_format($sku_sold);
                            $sku_onhand = ($sku_onhand==0)? "":number_format($sku_onhand);
                            $running_bal = ($running_bal==0)? "":number_format($running_bal);                          
                            ?>
                            
                            <tr>
                                <td>{{ $row->prodCode_grp }}</td>
                                <td>{{ $row->prodName_grp }}</td>
 
                                <td <?php echo $critical ?>>{{ $running_bal }}</td>
  
                                <td>{{ $q30 }}</td>
                                <td>{{ $q30_is }}</td>

                                <td>{{ $d14 }}</td>
                                <td>{{ $d14_is }}</td>

                                <td style="background-color: rgba(220, 250, 215, 0.35)">{{ $q1 }}</td>
                                <td style="background-color: rgba(220, 250, 215, 0.35)">{{ $q1_is }}</td>

                                <td>{{ $q2 }}</td>
                                <td>{{ $q2_is }}</td>

                                <td>{{ $q3 }}</td>
                                <td>{{ $q3_is }}</td>

                                <td>{{ $q4 }}</td>
                                <td>{{ $q4_is }}</td>

                                <td>{{ $q5 }}</td>
                                <td>{{ $q5_is }}</td>

                                <td>{{ $q6 }}</td>
                                <td>{{ $q6_is }}</td>

                                <td>{{ $q7 }}</td>
                                <td>{{ $q7_is }}</td>

                                <td>{{ $d07 }}</td>
                                <td>{{ $d07_is }}</td>

                                <td>{{ $q8 }}</td>
                                <td>{{ $q8_is }}</td>

                                <td>{{ $q9 }}</td>
                                <td>{{ $q9_is }}</td>

                                <td>{{ $q10 }}</td>
                                <td>{{ $q10_is }}</td>

                                <td>{{ $q11 }}</td>
                                <td>{{ $q11_is }}</td>

                                <td>{{ $q12 }}</td>
                                <td>{{ $q12_is }}</td>

                                <td>{{ $q13 }}</td>
                                <td>{{ $q13_is }}</td>

                                <td>{{ $q14 }}</td>
                                <td>{{ $q14_is }}</td>

                              </tr>
                            @endforeach
                          <tr>
                            <td colspan="40">
                              {{ $daily_ship->links() }}
                            </td>
                          </tr>
                        @else
                        <tr>
                            <td colspan="40">No Records</td>
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