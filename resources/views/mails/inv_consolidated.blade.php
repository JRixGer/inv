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
*{ margin:0; padding:0}
html, body{width:100%; min-height:100%;}
a{ text-decoration:none;}
li{ list-style-type:none;}
img{border:0;}
@font-face {
  font-family: 'Conv_BPG DejaVu Sans ExtraLight 2012';
  src: url('fonts/BPG DejaVu Sans ExtraLight 2012.eot');
  src: local('☺'), url('fonts/BPG DejaVu Sans ExtraLight 2012.ttf') format('truetype'), url('../fonts/BPG DejaVu Sans ExtraLight 2012.svg') format('svg');
  font-weight: normal;
  font-style: normal;
}
@font-face {
  font-family: 'Conv_BPG DejaVu Sans ExtraLight Caps 2012';
  src: url('fonts/BPG DejaVu Sans ExtraLight Caps 2012.eot');
  src: local('☺'), url('fonts/BPG DejaVu Sans ExtraLight Caps 2012.ttf') format('truetype'), url('../fonts/BPG DejaVu Sans ExtraLight Caps 2012.svg') format('svg');
  font-weight: normal;
  font-style: normal;
}

/*main css*/
#wrapper{
  width:95%;
  max-width:95%;
  padding:0%;
  background:#fafafa url(../images/corner.png) no-repeat right bottom;
  background-size:auto 100%;
  margin:1px auto; 
}
#maincContent{
  -webkit-box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.24);
  -moz-box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.24);
  box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.24);
  background-color:#fff;
  margin-bottom:7px;
  position:relative;
  clear:both;
  overflow:hidden;
  border-bottom-right-radius:10px;
}
#head{
  width:95%;
  max-width:95%;
  margin:2px auto;
}
#head h1{
  width:95%;
  height:47px;
  margin:2%; 

}
#head h1 a{
  display:block;
  text-indent:-9999px;
  width:95%;
  height:100%;
  background: url(../images/logo.png) no-repeat center center;  
}
#content{
  width:98%;
  max-width:98%;
  margin:1px auto;
}
#content h2{
  color:#5c5c5c;
  font-size:15px; 
  margin-bottom:5px;
  font-family: 'Conv_BPG DejaVu Sans ExtraLight 2012';
  margin:1%; 
}
#content .parpagraph{
  color:#5c5c5c;
  font-size:15px; 
  margin-bottom:5px;
  font-family: 'Conv_BPG DejaVu Sans ExtraLight 2012';
  font-weight:600;
  margin:1%;
}
#content .parpagraphB{
  color:#5c5c5c;
  font-size:14px; 
  margin-bottom:5px;
  font-family: 'Conv_BPG DejaVu Sans ExtraLight Caps 2012';
  font-weight:600;
  margin:1%;
}
#content img{
  display:block;
  margin:0%;
}
#maincContent::after {
  content: "";
  position: absolute;
  z-index:2;
  bottom: 0;
  right: 0%;
  width: 0px;
  height: 0px;
  border-top:35px solid #dbdbdb;
  border-right: 35px solid #dbdbdb;
}  
#footer{
  width:95%;
  max-width:95%;
  margin:0 auto;
}
#footer ul{
  margin-left:7%;
  overflow:hidden;  
}
#footer ul li{
  display:inline-block;
  float:left;
  width:  31px;
  height:35px;
  margin-right:2%;
}
#footer ul li a{
  display:block;
  width:95%;
  height:100%;
  text-indent:-9999px;  
  margin-bottom:8px;
}
#footer ul li a.mail{
  background:url(../images/mail.png) no-repeat center center;
}
#footer ul li a.fb{
  background:url(../images/fb.png) no-repeat center center;
}
#footer ul li a.link{
  background:url(../images/link.png) no-repeat center center;
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
                <h2>Below is the CB and IS consolidated inventory report on {{ $today }}: ({{ $d }}) 
                </h2>
                <div class="parpagraph" style="width:100%">
                   <table style="border-collapse:collapse; text-align:left; width="100%">
                        <tr style="background-color: rgba(245, 253, 122, 0.35);">
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 0px solid #ffffff;"> </td>
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 0px solid #ffffff;"> </td>
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-bottom: 0px solid #ffffff;"> </td>
                          <td style="border-top: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;color: rgb(0, 85, 255); border-bottom: 0px solid #ffffff;"></td>

                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; color: rgb(255, 0, 0); text-align: center;background-color: rgba(220, 250, 215, 0.35)">30D</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; color: rgb(255, 0, 0); text-align: center;background-color: rgba(178, 212, 255, 0.32)">14D</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last1 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">{{ $dt_last2 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last3 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">{{ $dt_last4 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last5 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">{{ $dt_last6 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last7 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">7D</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last8 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">{{ $dt_last9 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last10 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">{{ $dt_last11 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last12 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">{{ $dt_last13 }}</td>
                          <td colspan="2"  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">{{ $dt_last14 }}</td>
                      </tr>
                      <tr style="background-color: rgba(245, 253, 122, 0.35);">
                          <td  style="font-size: 14px; padding: 5px;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">CB SKU</td>
                          <td  style="font-size: 14px; padding: 5px;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">IS SKU</td>
                          <td  style="font-size: 14px; padding: 5px;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">Product Name</td>
                          <td  style="font-size: 14px; padding: 5px;border-bottom: 1px solid #dddddd;border-left: 1px solid #dddddd;border-right: 1px solid #dddddd;border-top: 0px solid #ffffff;">Bal</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>

                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(178, 212, 255, 0.32)">IS</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">CB</td>
                          <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; text-align: center;background-color: rgba(220, 250, 215, 0.35)">IS</td>
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

                            $critical = "style='font-size: 12px; border: 1px solid #dddddd;'";
                            if((int)$running_bal < 50)
                              $critical = "style='font-size: 12px; background-color:#F1948A; border: 1px solid #dddddd;'";     

                            $sku_sold = ($sku_sold==0)? "":number_format($sku_sold);
                            $sku_onhand = ($sku_onhand==0)? "":number_format($sku_onhand);
                            $running_bal = ($running_bal==0)? "":number_format($running_bal);                          
                            

                            ?>
                            
                            <tr>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd;">{{ $row->prodCode_grp }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd;">{{ $row->is_sku }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd;">{{ $row->prodName_grp }}</td>
 
                                <td <?php echo $critical ?>>{{ $running_bal }}</td>
  
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q30 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q30_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $d14 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $d14_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q1 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q1_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q2 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q2_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q3 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q3_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q4 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q4_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q5 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q5_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q6 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q6_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q7 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q7_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $d07 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $d07_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q8 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q8_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q9 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q9_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q10 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q10_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q11 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q11_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q12 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q12_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q13 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(178, 212, 255, 0.32)">{{ $q13_is }}</td>

                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q14 }}</td>
                                <td  style="font-size: 14px; padding: 5px;border: 1px solid #dddddd; background-color: rgba(220, 250, 215, 0.35)">{{ $q14_is }}</td>

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