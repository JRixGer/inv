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

.col {
  font-weight: bold;
}
.fortd1 {
  font-size: 14px; border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32);
}
.fortd2 {
  font-size: 14px; border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32);
}
.fortop {
  background:rgba(250, 248, 215); 
  height: 2em;
  padding-top: 7px;
}
.forlowh {
  height: 1.5em;
  background: rgba(178, 212, 255, 0.32); 
}
.forlow {
  height: 2em;
  padding-top: 7px;
  background: rgba(178, 212, 255, 0.32); 
}
.fortd1_top {
  font-size: 14px; border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32);padding: 10px;
}
.fortd2_top {
  font-size: 14px; border: 1px solid #dddddd; text-align: center;background-color: #AED6F1;padding: 10px;
}
.fortd1_ {
  font-size: 14px; border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32); min-width: 50px;
}
.fortd2_ {
  font-size: 14px; border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32); min-width: 50px;
}
</style>
</head>
<body>
  <section id="wrapper"><!--id="wrapper"-->
      <section id="maincContent"><!--id="maincContent"-->
          <section id="content"><!--id="content"-->
                <h2>Below is the CB and IS consolidated inventory report on {{ $today }}: ({{ $d }}) 
                </h2>
                <div class="parpagraph" style="width:100%">
                   <table style="border-collapse:collapse; text-align:left; width="100%">
                        <tr style="background-color: #AED6F1;">
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 0px solid #ffffff;"> </td>
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 0px solid #ffffff;"> </td>
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 0px solid #ffffff;"> </td>
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;color: rgb(0, 85, 255); border-bottom: 0px solid #ffffff;"></td>
                          <td style="font-size: 14px; border: 1px solid #dddddd; color: rgb(255, 0, 0); text-align: center;background-color: #AED6F1;">30D</td>
                          <td style="font-size: 14px; border: 1px solid #dddddd; color: rgb(255, 0, 0); text-align: center;background-color: rgba(178, 212, 255, 0.32)">14D</td>
                          <td class="fortd2_top">{{ $dt_last1 }}</td>
                          <td class="fortd2_top">{{ $dt_last2 }}</td>
                          <td class="fortd2_top">{{ $dt_last3 }}</td>
                          <td class="fortd2_top">{{ $dt_last4 }}</td>
                          <td class="fortd2_top">{{ $dt_last5 }}</td>
                          <td class="fortd2_top">{{ $dt_last6 }}</td>
                          <td class="fortd2_top">{{ $dt_last7 }}</td>
                          <td class="fortd2_top">7D</td>
                          <td class="fortd2_top">{{ $dt_last8 }}</td>
                          <td class="fortd2_top">{{ $dt_last9 }}</td>
                          <td class="fortd2_top">{{ $dt_last10 }}</td>
                          <td class="fortd2_top">{{ $dt_last11 }}</td>
                          <td class="fortd2_top">{{ $dt_last12 }}</td>
                          <td class="fortd2_top">{{ $dt_last13 }}</td>
                          <td class="fortd2_top">{{ $dt_last14 }}</td>
                      </tr>
                      <tr style="background-color: #AED6F1;">
                          <td  style="padding:7px; font-size: 14px; border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">CB SKU</td>
                          <td  style="padding:7px; font-size: 14px; border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">IS SKU</td>
                          <td  style="padding:7px; font-size: 14px; border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">Product Name</td>
                          <td  style="padding:7px; font-size: 14px; border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">Bal</td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd2_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                          <td  class="fortd1_"><div class="forlowh">IS</div><div class="forlowh">CB</div></td>
                       </tr>
                      <tr>

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

                            $critical = "style='padding:7px; font-size: 12px; border: 1px solid #dddddd;'";
                            if((int)$running_bal < 50)
                              $critical = "style='padding:7px; font-size: 12px; background-color:#F1948A; border: 1px solid #dddddd;'";     

                            $sku_sold = ($sku_sold==0)? "":number_format($sku_sold);
                            $sku_onhand = ($sku_onhand==0)? "":number_format($sku_onhand);
                            $running_bal = ($running_bal==0)? "":number_format($running_bal);                          
                            

                            ?>
                            
                            <tr>
                                <td  style="padding:7px; font-size: 14px; border: 1px solid #dddddd;">{{ $row->prodCode_grp }}</td>
                                <td  style="padding:7px; font-size: 14px; border: 1px solid #dddddd;">{{ $row->is_sku }}</td>
                                <td  style="padding:7px; font-size: 14px; border: 1px solid #dddddd;">{{ $row->prodName_grp }}</td>
 
                                <td <?php echo $critical ?>>{{ $running_bal }}</td>
                                <td class="fortd1"><div class="fortop">{{ $q30_is}}</div><div class="forlow">{{ $q30 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $d14_is }}</div><div class="forlow">{{ $d14 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q1_is }}</div><div class="forlow">{{ $q1 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $q2_is }}</div><div class="forlow">{{ $q2 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q3_is }}</div><div class="forlow">{{ $q3 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $q4_is }}</div><div class="forlow">{{ $q4 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q5_is }}</div><div class="forlow">{{ $q5 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $q6_is }}</div><div class="forlow">{{ $q6 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q7_is }}</div><div class="forlow">{{ $q7 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $d07_is }}</div><div class="forlow">{{ $d07 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q8_is }}</div><div class="forlow">{{ $q8 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $q9_is }}</div><div class="forlow">{{ $q9 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q10_is }}</div><div class="forlow">{{ $q10 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $q11_is }}</div><div class="forlow">{{ $q11 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q12_is }}</div><div class="forlow">{{ $q12 }}</div></td>
                                <td class="fortd2"><div class="fortop">{{ $q13_is }}</div><div class="forlow">{{ $q13 }}</div></td>
                                <td class="fortd1"><div class="fortop">{{ $q14_is }}</div><div class="forlow">{{ $q14 }}</div></td>

                              </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="40">No Records</td>
                        </tr>
                        @endif

                      </tbody>
                    </table>

                </div>
          </section><!--End of id="content"-->
        </section><!--En dof id="maincContent"-->
    </section><!--End of id="wrapper"-->
</body>
</html>