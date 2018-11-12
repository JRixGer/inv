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
                <div class="card-header title_">Inventory</div>
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

                            <th scope="col">@sortablelink('prodCode','CB SKU')</th>
                            <th scope="col">@sortablelink('prodName_common','Product Name')</th>
                            <th scope="col" style="color: rgb(0, 85, 255);">Bal</th>

                            <th scope="col" style="color: rgb(255, 0, 0);">@sortablelink('qty30','30D')</th>
                            <th scope="col" style="color: rgb(255, 0, 0);">14D</th>
                            <td scope="col" style="background-color: rgba(220, 250, 215, 0.35)">@sortablelink('qty01',$dt_last1)</td>
                            <th scope="col">@sortablelink('qty02',$dt_last2)</th>
                            <th scope="col">@sortablelink('qty03',$dt_last3)</th>
                            <th scope="col">@sortablelink('qty04',$dt_last4)</th>
                            <th scope="col">@sortablelink('qty05',$dt_last5)</th>
                            <th scope="col">@sortablelink('qty06',$dt_last6)</th>
                            <th scope="col">@sortablelink('qty07',$dt_last7)</th>
                            <th scope="col" style="color: rgb(255, 0, 0);">7D</th>
                            <th scope="col">@sortablelink('qty08',$dt_last8)</th>
                            <th scope="col">@sortablelink('qty09',$dt_last9)</th>
                            <th scope="col">@sortablelink('qty10',$dt_last10)</th>
                            <th scope="col">@sortablelink('qty11',$dt_last11)</th>
                            <th scope="col">@sortablelink('qty12',$dt_last12)</th>
                            <th scope="col">@sortablelink('qty13',$dt_last13)</th>
                            <th scope="col">@sortablelink('qty14',$dt_last14)</th>

                        </tr>
                      </thead>
                      <tbody>

                        @if($daily_ship->count() > 0)
                            @foreach($daily_ship as $row)

                            <?php 
                            $d07 = ($row->qty08+$row->qty09+$row->qty10+$row->qty11+$row->qty12+$row->qty13+$row->qty14);
                            $d14 = ($row->qty01+$row->qty02+$row->qty03+$row->qty04+$row->qty05+$row->qty06+$row->qty07)+$d07; 
                            $sku_onhand = is_numeric($row->onhand)? $row->onhand:0;
                            $sku_sold = (is_numeric($row->sold) && $row->sold > 0)? $row->sold:$row->totalsold;

                            $running_bal = $sku_onhand - $sku_sold;

                            $d07 = ($d07=="" || $d07==0)? "":$d07; 
                            $d14 = ($d14=="" || $d14==0)? "":$d14; 

                            $qty01 = ($row->qty01=="" || $row->qty01==0)? "":$row->qty01; 
                            $qty02 = ($row->qty02=="" || $row->qty02==0)? "":$row->qty02;
                            $qty03 = ($row->qty03=="" || $row->qty03==0)? "":$row->qty03;
                            $qty04 = ($row->qty04=="" || $row->qty04==0)? "":$row->qty04;
                            $qty05 = ($row->qty05=="" || $row->qty05==0)? "":$row->qty05;
                            $qty06 = ($row->qty06=="" || $row->qty06==0)? "":$row->qty06;
                            $qty07 = ($row->qty07=="" || $row->qty07==0)? "":$row->qty07;
                            $qty08 = ($row->qty08=="" || $row->qty08==0)? "":$row->qty08;
                            $qty09 = ($row->qty09=="" || $row->qty09==0)? "":$row->qty09;
                            $qty10 = ($row->qty10=="" || $row->qty10==0)? "":$row->qty10;
                            $qty11 = ($row->qty11=="" || $row->qty11==0)? "":$row->qty11;
                            $qty12 = ($row->qty12=="" || $row->qty12==0)? "":$row->qty12;
                            $qty13 = ($row->qty13=="" || $row->qty13==0)? "":$row->qty13;
                            $qty14 = ($row->qty14=="" || $row->qty14==0)? "":$row->qty14;
                            $qty30 = ($row->qty30=="" || $row->qty30==0)? "":$row->qty30;

                            $critical = "";
                            if((int)$running_bal < 50)
                              $critical = "style='background-color:#ff00003d'";     

                            $sku_sold = ($sku_sold==0)? "":number_format($sku_sold);
                            $sku_onhand = ($sku_onhand==0)? "":number_format($sku_onhand);
                            $running_bal = ($running_bal==0)? "":number_format($running_bal);
                            
                         
                            ?>
                            
                            <tr>
                                <td>{{ $row->prodCode }}</td>
                                <td>{{ $row->prodName_common }}</td>

 
                                <td <?php echo $critical ?>>{{ $running_bal }}</td>

                                <td>{{ $qty30 }}</td>
                                <td>{{ $d14 }}</td>
                                <td style="background-color: rgba(220, 250, 215, 0.35)">{{ $qty01 }}</td>
                                <td>{{ $qty02 }}</td>
                                <td>{{ $qty03 }}</td>
                                <td>{{ $qty04 }}</td>
                                <td>{{ $qty05 }}</td>
                                <td>{{ $qty06 }}</td>
                                <td>{{ $qty07 }}</td>

                                <td>{{ $d07 }}</td>
                                <td>{{ $qty08 }}</td>
                                <td>{{ $qty09 }}</td>
                                <td>{{ $qty10 }}</td>
                                <td>{{ $qty11 }}</td>
                                <td>{{ $qty12 }}</td>
                                <td>{{ $qty13 }}</td>
                                <td>{{ $qty14 }}</td>

                              </tr>
                            @endforeach
                          <tr>
                            <td colspan="20">
                              {{ $daily_ship->appends(\Request::except('page'))->render() }}
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