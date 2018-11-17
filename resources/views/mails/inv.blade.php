<?php

  $datenow = date('Y-m-d H:i:s');
  $datecurr = strtotime($datenow);

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

  $date14 = strtotime('-13 day' , strtotime($datenow));
  $d = date('n/j/Y',$date14) .' - '. date('n/j/Y',$datecurr);

  $today = date("jS \of F Y");

?>


<!DOCTYPE html>
<html>
<head>
  <title>Inventory</title>  
  <meta charset="utf-8" />  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<script>
  document.createElement("header"); 
  document.createElement("nav");
  document.createElement("footer");
  document.createElement("section")
</script>
<style>
html, body{width:100%; min-height:100%; font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif !important;}
/*main css*/
#wrapper{
  width:99%;
  padding:0%;
  background-size:auto 100%;
}
#maincContent{
  background-color:#fff;
  position:relative;
  clear:both;
  overflow:hidden;
}
#content{
  width:98%;
  max-width:98%;
}
#content h2{
  color:#5c5c5c;
  font-size:15px; 
  margin-bottom:5px;
  font-family: 'Conv_BPG DejaVu Sans ExtraLight 2012';
}

tr.border_bottom td {
  border:1pt solid #cccccc;
  font-size: 12px;
}
td {
  padding: 3px;
}
.col {
  font-weight: bold;
}
</style>
</head>
<body>
  <section id="wrapper"><!--id="wrapper"-->
      <section id="maincContent"><!--id="maincContent"-->
          <section id="content"><!--id="content"-->
                <h2>Below is the CB inventory report on {{ $today }}: ({{ $d }}) 
                </h2>
                <div class="parpagraph" style="width:100%">
                   <table style="border-collapse:collapse; text-align:left; width="100%">
                        <tr style="background-color: #AED6F1;">
                          <td style="border: 1px solid #dddddd; padding:8px;">CB SKU </td>
                          <td style="border: 1px solid #dddddd; padding:9px;">DESCRIPTION</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">BAL</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">30D</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">14D</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last1}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last2}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last3}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last4}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last5}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last6}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last7}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">7D</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last8}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last9}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last10}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last11}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last12}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last13}}</td>
                          <td style="border: 1px solid #dddddd; padding:9px;">{{$dt_last14}}</td>

                        </tr>
                            @foreach($daily_ship_inv as $row)

                            <?php 
                            $d07 = ($row->qty08+$row->qty09+$row->qty10+$row->qty11+$row->qty12+$row->qty13+$row->qty14);
                            $d14 = ($row->qty01+$row->qty02+$row->qty03+$row->qty04+$row->qty05+$row->qty06+$row->qty07)+$d07; 

                            $sku_onhand = is_numeric($row->onhand)? $row->onhand:0;
                            $totalsold = is_numeric($row->totalsold)? $row->totalsold:0;   

                            $running_bal = $sku_onhand - $sku_sold;
                            $running_bal = ($running_bal-$totalsold);  

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

                            if ($running_bal < $qty30 && $running_bal > $qty14 && $running_bal > $qty07) 
                                $critical = "style='background-color:#FFFF00; border: 1px solid #dddddd; padding:9px; font-weight:bold;'";
                            else if ($running_bal < $qty30 && $running_bal < $qty14 && $running_bal > $qty07)
                                $critical = "style='background-color:#FFCCCC; border: 1px solid #dddddd; padding:9px; font-weight:bold;'";
                            else if ($running_bal < $qty30 && $running_bal < $qty14 && $running_bal <= $qty07)
                                $critical = "style='background-color:#F1948A; border: 1px solid #dddddd; padding:9px; font-weight:bold;'"; 
                            else if ($running_bal < 50)
                                $critical = "style='background-color:#F1948A;border: 1px solid #dddddd; padding:9px;'";
                            else 
                                $critical = "style='border: 1px solid #dddddd; padding:9px;'";

                            // $critical = "style='border: 1px solid #dddddd; padding:9px;'";
                            // if($running_bal < 50)
                            //   $critical = "style='background-color:#F1948A;border: 1px solid #dddddd; padding:9px;'";                              

                            $sku_sold = ($sku_sold==0)? "":number_format($sku_sold);
                            $sku_onhand = ($sku_onhand==0)? "":number_format($sku_onhand);
                            $running_bal = ($running_bal==0)? "":number_format($running_bal);

                            ?>
                            
                           <tr>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $row->prodCode }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $row->prodName_common }}</td>

                                <td <?php echo $critical ?>>{{ $running_bal }}</td>

                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty30 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $d14 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;background-color: rgba(220, 250, 215, 0.35)">{{ $qty01 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty02 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty03 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty04 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty05 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty06 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty07 }}</td>

                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $d07 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty08 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty09 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty10 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty11 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty12 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty13 }}</td>
                                <td style="border: 1px solid #dddddd; padding:9px;">{{ $qty14 }}</td>
                              </tr>
                            @endforeach
                    </table>

                </div>
          </section><!--End of id="content"-->
        </section><!--En dof id="maincContent"-->
    </section><!--End of id="wrapper"-->
</body>
</html>