<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('public/js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    

    <script src="{{ asset('public/js/toastr.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>


    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('public/css/toastr.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <style>
    html, body {
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        /* height: 100vh; */
        margin: 0;
        background: url("/inv/public/images/fba7da61.png") repeat;
    }    
    #imgcenter img {
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .modal-header {
        background-color: rgb(227, 242, 253);
    }
    .panel-lnk {
        color: #686868;
        text-decoration: none;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
        font-weight: 700;
    }
    .datefrom {
        display: none;
        width:100%
    }
    .dateto {
        display: none;
        width:100%
    }
    .transactiontype {
        display: none;
        width:100%
    }
    .datefilter{
        display: none;
        width:100%
    }
    .removeMatchCheckBox{
        display: none;
        width:100%
    }    
    .limit-text {
        text-align:left;
        width: auto;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-transition: all 0.35s ease;
        -moz-transition: all 0.35s ease;
        -o-transition: all 0.35s ease;
        -ms-transition: all 0.35s ease;
        transition: all 0.35s ease;
    }  
    #PIC{
        display: none;
    }
     </style>

<body>
    <div id="app">
      
      <!-- bg-light, bg-dark, bg-info, bg-danger, bg-primary, bg-warning, or bg-success -->
         <!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top" style="background-color: #e3f2fd;"> -->
        <nav class="navbar navbar-dark py-0 bg-dark navbar-expand-lg py-md-0 navbar-laravel" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('shipping/dashboard') }}">
                   
                    <img src="/inv/public/images/favicon.ico" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Inventory<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('inventory.list') }}">Click Bank</a>
                              <a class="dropdown-item" href="{{ route('inventory.list_is') }}">Infusion Soft</a>
                              <a class="dropdown-item" href="{{ route('inventory.list_consolidated') }}">Consolidated</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                SKU Mgmt<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('sku.mapping') }}">Mapping</a>
                              <a class="dropdown-item" href="{{ route('sku.list') }}">Consolidated</a>
                              <a class="dropdown-item" href="{{ route('sku.goals') }}">HasOffers Goals</a>

                            </div>
                        </li>

                        <li><a class="nav-link" href="{{ route('maropost.list') }}">Maropost</a></li>
                        <li><a class="nav-link" href="{{ route('notifications.list') }}">Raw</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            DB Mining<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('report.options') }}?t=pwcp">PWCP</a>
                              <a class="dropdown-item" href="{{ route('report.options') }}?t=pic">PIC</a>
                            </div>
                        </li>                        
                        @auth
                        <li><a class="nav-link" href="http://ship.preparedpatriot.us/index.php?l=ea7a8e98f1a61b0ae181ba1cf22a5333">Shipping</a></li>                                                
                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            
            
        
        </main>
   
    </div>
    @yield('javascripts')
</body>

<script type="text/javascript">

    function post_maro(receipt)
    {

        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url:'/inv/shipping/maropost/mpost',
           data:{r:receipt},
           success:function(data){
              window.location.reload();
           }
        });
    }  


    function load_sku(id, pcode, cbpcode_grp, ispcode_grp, pname, pname_grp, pname_common, campaign_id, tag_name, goal_id)
    {
        $("#pid_update").val(id);
        $("#pcode_update").val(pcode);
        $("#cbpcode_grp_update").val(cbpcode_grp);
        $("#ispcode_grp_update").val(ispcode_grp);
        $("#pname_update").val(pname);
        $("#pname_grp_update").val(pname_grp);
        $("#pname_common_update").val(pname_common);
        $("#campaign_id").val(campaign_id);
        $("#tag_name").val(tag_name);
        $("#goal_id").val(goal_id);
        $("#update_sku_model").modal('show');
    }  


    function effect_update_sku()
    {

        var pid = $("#pid_update").val();
        var pcode = $("#pcode_update").val();
        var cbpcode_grp = $("#cbpcode_grp_update").val();
        var ispcode_grp = $("#ispcode_grp_update").val();
        var pname_grp = $("#pname_grp_update").val();
        var pname_common = $("#pname_common_update").val();
        var campaign_id = $("#campaign_id").val();
        var tag_name = $("#tag_name").val();
        var goal_id = $("#goal_id").val();
        
        //$("#update_sku_model").modal('hide');

        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url:'/inv/shipping/sku/effect_update',
           data:{id:pid, pcode:pcode, cbpcode_grp:cbpcode_grp, ispcode_grp:ispcode_grp, pname_grp:pname_grp, pname_common:pname_common, campaign_id:campaign_id, tag_name:tag_name, goal_id:goal_id},
           success:function(data){
              window.location.reload();
           },
           error: function(data) {
                var errors = data.responseJSON;
                console.log(errors['message']);
                toastr.options.timeOut = 1000; 
                //toastr.options.closeButton = true;
                toastr.error(errors['message']);
            }
        });

    }  

    function hide_result()
    {
        $("#search_list").hide();
    }

    $(document).ready(function() {
        $("#search_sku").click(function(){
            
            if($("#search_key").val()=="")
               return;     

            $("#search_list").show();
            $("#search_list").html('<div id="imgcenter" style="width:100%; height:100%"><img src="../../public/images/loading.gif"></div>');

            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               type:'POST',
               url:"{{ route('sku.search') }}",
               data:{search_key:$("#search_key").val()},
               dataType:"html",
               success: function (data) {
                    var data = JSON.parse(data);
                    $("#search_list").html(data.result);
               },
               error: function(data) {
                    var errors = data.responseJSON;
                }
            });

        }); 

    });

    function send_mail(m)
    {
        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        if(m == 'cb_inv')
        {
            $.ajax({
               type:'GET',
               url:"{{ route('mail.send') }}",
               success: function (data) {
                    toastr.success("Email successfully Sent.");
               }
            });  
        }
        else
        {
            $.ajax({
               type:'GET',
               url:"{{ route('mail.send_consolidated') }}",
               success: function (data) {
                    toastr.success("Email successfully Sent.");
               }
            });  
        }
    }
    
    function reload_sku()
    {
        document.location = "{{ route('sku.list') }}?n="+$("#show_n").val();
    }

    function showHide()
    {
        if($("#reportOpt").val() == '2' || $("#reportOpt").val() == '4' || $("#reportOpt").val() == '3')                                
        {
            $(".datefrom").show();
            $(".dateto").show();
            $(".transactiontype").hide();
            $(".datefilter").hide();          
            $(".removeMatchCheckBox").hide();  
        }
        else if($("#reportOpt").val() == '7')                                
        {
            $(".datefrom").hide();
            $(".dateto").hide();
            $(".transactiontype").hide();
            $(".datefilter").hide();
            $(".removeMatchCheckBox").show();
        }        
        else
        {
            $(".datefrom").hide();
            $(".dateto").hide();
            $(".transactiontype").hide();
            $(".datefilter").hide();
            $(".removeMatchCheckBox").hide();
            
        }
    }

      
    function dataMine()
    {

        var repOption = $("#reportOpt").val();
        var fromDt = $("#datepicker1").val();
        var toDt = $("#datepicker2").val();
        var transType = $("#transactionType").val();
        var dateFltr = $("#dateFilter").val();
        var remMatch = $("#remMatch:checked").val()? 1:0;
        var reportSelected = $("#reportSelected").val();
       
        if(repOption == 2 && (fromDt.length == 0 || toDt.length == 0))
            return;

        $("#spinner").html('<div id="imgcenter" style="width:100%; height:100%"><img src="../../public/images/loading.gif"><p style="text-align:center; color:#ccc; font-size:10px">please wait</p></div>');
        $("#dataList").hide();

        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
           type:'GET',
           url:'/inv/shipping/report/datamine',
           data:{repOption:repOption, fromDt:fromDt, toDt:toDt, transType:transType, dateFltr:dateFltr, remMatch:remMatch, reportSelected:reportSelected},
           success:function(data){        
                       
                if(repOption == 1)
                {          
                    //console.log(repOption);      
                    $("#spinner").html('');
                    $("#dataList").show();
                    $("#datatablediv").show();
                    $("#datatabledivcrossref").hide();
                    $("#datatabledivaff").hide();
                    var data = JSON.parse(data);
                    var totMember = "<p><span>Total Members To Date: <font style='font-size:20px'><b>"+data.members+"</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                    var memberYesterday = "<span>Added Yesterday: <font style='font-size:20px'><b>"+data.membersYesterday+"</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                    var member7DaysAgo = "<span>Last 7 Days: <font style='font-size:20px'><b>"+data.membersLast7Days+"</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                    var member30DaysAgo = "<span>Last 30 Days: <font style='font-size:20px'><b>"+data.membersLast30Days+"</b></font></span></p>";
                    $("#summary").html(totMember+memberYesterday+member7DaysAgo+member30DaysAgo);
                    list(data.listAll);

                }
                else if(repOption == 2)
                {             
                    //console.log(repOption);       
                    $("#spinner").html('');
                    $("#dataList").show();
                    $("#datatablediv").show();
                    $("#datatabledivcrossref").hide();
                    $("#datatabledivaff").hide();
                    var data = JSON.parse(data);
                    $("#summary").html("");
                    list(data.listAll);
                }
                else if(repOption == 3)
                {
                    $("#spinner").html('');
                    $("#dataList").show();
                    $("#datatablediv").show();
                    $("#datatabledivcrossref").hide();
                    $("#datatabledivaff").hide();
                    var data = JSON.parse(data);
                    $("#summary").html("");
                    list(data.listAll);
                }            
                else if(repOption == 4)
                {             
                    //console.log(repOption);       
                    $("#spinner").html('');
                    $("#dataList").show();
                    $("#datatablediv").show();
                    $("#datatabledivcrossref").hide();
                    $("#datatabledivaff").hide();
                    
                    var data = JSON.parse(data);

                    var header = "<table class='table table-bordered' style='width:100%; font-size:18px'><tr><td style='font-weight:bold'>MEMBERS</td><td style='font-weight:bold'>Date Range:<br>"+fromDt+" &#8594; "+toDt+"</td><td style='font-weight:bold'>To Date(Total)</td><td style='font-weight:bold'>Last 30 Days</td><td style='font-weight:bold'>Last 7 days</td><td style='font-weight:bold'>Yesterday</td></tr>";

                    var activeM = "<tr><td>ACTIVE</td><td>"+data.membersRange+"</td><td>"+data.members+"</td><td>"+data.membersLast30Days+"</td><td>"+data.membersLast7Days+"</td><td>"+data.membersYesterday+"</td></tr>";

                    var canceledM = "<tr><td>CANCELED</td><td>"+data.membersRangeCanceled+"</td><td>"+data.membersCanceled+"</td><td>"+data.membersLast30DaysCanceled+"</td><td>"+data.membersLast7DaysCanceled+"</td><td>"+data.membersYesterdayCanceled+"</td></tr></table>";
                    
                    $("#summary").html(header+activeM+canceledM);
                    $('#datatablediv').hide();
                    $('#datatabledivaff').hide();
                    //list(data.listAll);
                }
                else if(repOption == 6)
                {             
                    //console.log(repOption);       
                    $("#spinner").html('');
                    $("#dataList").show();
                    $("#datatablediv").hide();
                    $("#datatabledivcrossref").hide();
                    $("#datatabledivaff").show();
                    var data = JSON.parse(data);
                    
                    var totalAffiliates = "<p><span>Total Affiliates To Date: <font style='font-size:20px'><b>"+data.totalAffiliates+"</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                    var totalAffiliatesMembers = "<span>Total Affiliates Members To Date: <font style='font-size:20px'><b>"+data.totalAffiliatesMembers+"</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                    var allMembers = "<span>Total Members To Date: <font style='font-size:20px'><b>"+data.allMembers+"</b></font></span></p>";

                    $("#summary").html(totalAffiliates+totalAffiliatesMembers+allMembers);
                    listAffiliate(data.listAll);

                }     
                else if(repOption == 7)
                {             
                    //console.log(repOption);       
                    $("#spinner").html('');
                    $("#dataList").show();
                    $("#datatablediv").hide();
                    $("#datatabledivaff").hide();
                    $("#datatabledivcrossref").show();
                    var data = JSON.parse(data);

                    console.log(data);

                    $("#summary").html("");
                    list_CB_IS_CrossRef(data.listAll);

                }                  
           }
        });  

        
    }

    function list(data)
    {
        console.log(data)
        $('#datatable').DataTable().destroy();
        $('#datatable').DataTable( {
            lengthMenu: [ 10, 25, 50, 75, 100 ],
            data: data,
            retrieve: true,
            "columns": [
              { "data": "firstName" },
              { "data": "lastName" },
              { "data": "email" },
              { "data": "Dates" },
              { "data": "SKUs" },
              { "data": "ProductNames" },
              { "data": "Receipts" },
              { "data": "NoOfReBills" }

            ]
        } );
    }

    function listAffiliate(data)
    {
        console.log(data)
        $('#datatableaff').DataTable().destroy();
        $('#datatableaff').DataTable( {
            lengthMenu: [ 10, 25, 50, 75, 100 ],
            data: data,
            retrieve: true,
            "columns": [
              { "data": "affiliate" },
              { "data": "TotalMembers" },
              { "data": "Members" },
              { "data": "Emails" },
              { "data": "Dates" },
              { "data": "SKUs" },
              { "data": "ProductNames" },
              { "data": "Receipts" },
              { "data": "NoOfReBills" }

            ]
        } );
    }

    function list_CB_IS_CrossRef(data)
    {
        console.log(data)
        $('#datatablecrossref').DataTable().destroy();
        $('#datatablecrossref').DataTable( {
            lengthMenu: [ 10, 25, 50, 75, 100 ],
            data: data,
            "order": [[ 12, "asc" ]],
            retrieve: true,
            "columns": [
              { "data": "CB_FirstName" },
              { "data": "CB_LastName" },
            //   { "data": "CB_Email" },
              { "data": "CB_Dates" },
              { "data": "CB_SKUs" },
              { "data": "CB_ProductNames" },
              { "data": "CB_Receipts" },
              { "data": "CB_NoOfReBills" },
              { "data": "IS_FirstName" },
              { "data": "IS_LastName" },
              { "data": "IS_OrderDate" },
              { "data": "IS_OrderTitle" },
              { "data": "IS_ProductNames" },
              { "data": "lnk_name" }
            ]
        } );
    }



    $(document).ready(function() {
        $('#datepicker1').datepicker({
            dateFormat: "mm-dd-yyyy", autoclose: true
        });
        $('#datepicker2').datepicker({
            dateFormat: "mm-dd-yyyy", autoclose: true
        });  
    });

</script>
@yield('scripts')

<!-- {"message":"The given data was invalid.","errors":{"pqty":["The pqty must be a number."]}} -->
</html>
