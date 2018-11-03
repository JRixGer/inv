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
  padding:1%;
  background:#fafafa url(../images/corner.png) no-repeat right bottom;
  background-size:auto 100%;
  margin:10px auto; 
}
#maincContent{
  -webkit-box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.24);
  -moz-box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.24);
  box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.24);
  background-color:#fff;
  margin-bottom:13px;
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
  width:95%;
  max-width:95%;
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
  margin:2%;
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
          <header id="head"><!--header-->
            <h1><a href="index.html" target="_blank">Inventory</a></h1>           
          </header><!--End of header-->
          <section id="content"><!--id="content"-->
                <h2> Hello Sir Joe,<br><br>Below is the inventory report for : {{ $d }} <br><br>
                </h2>
                <div class="parpagraph" style="width:100%">
                   <table class="table table-sm">
                        <tr class="border_bottom">
                          <th scope="col">CB SKU </th>
                          <th scope="col">DESC</th>
                          <th scope="col" style="color: rgb(0, 85, 255);">Bal</th>
                          <th scope="col" style="color: rgb(255, 0, 0);">30D</th>
                          <th scope="col" style="color: rgb(255, 0, 0);">14D</th>
                          <th scope="col" style="background-color: rgba(220, 250, 215, 0.35)">{{$dt_last1}}</th>
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
                            @foreach($daily_ship as $row)
                            <?php 
                            $d07 = ($row->qty08+$row->qty09+$row->qty10+$row->qty11+$row->qty12+$row->qty13+$row->qty14);
                            $d14 = ($row->qty01+$row->qty02+$row->qty03+$row->qty04+$row->qty05+$row->qty06+$row->qty07)+$d07; 
                            $sku_qty = is_numeric($row->prodQty)? $row->prodQty:0;
                            $sku_onhand = is_numeric($row->onhand)? $row->onhand:0;
                            $sku_sold = is_numeric($row->sold)? $row->sold:0;
                            $running_bal = $sku_onhand - $sku_sold;
                            $critical = "";

                            if($running_bal < 50)
                              $critical = "style='background-color:#ff00003d'";                              
                            ?>
                            
                            <tr>
                                <td>{{ $row->item_number }}</td>
                                <td>{{ $row->description }}</td>

                                <td <?php echo $critical ?>>{{ number_format($running_bal) }}</td>

                                <td>{{ $row->qty30 }}</td>
                                <td>{{ $d14 }}</td>
                                <td style="background-color: rgba(220, 250, 215, 0.35)">{{ $row->qty01 }}</td>
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
                    </table>

                </div>
                <br>
                <div class="parpagraphB">
                 Thank you
                </div>
                <!-- <img src="../images/line.png" alt="#" /> -->
          </section><!--End of id="content"-->
           
        </section><!--En dof id="maincContent"-->
        <!-- <footer id="footer">
          <ul>
              <li><a href="#" target="_blank"  class="mail">mail</a></li>
                <li><a href="#" target="_blank" class="fb">facebook</a></li>
                <li><a href="#" target="_blank" class="link">link</a></li>
            </ul>
        </footer> -->
    </section><!--End of id="wrapper"-->
</body>
</html>