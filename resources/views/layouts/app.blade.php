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
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  

    

    <script src="{{ asset('public/js/toastr.js') }}"></script>
  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    
    
    

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

     </style>

</head>

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
                        <li><a class="nav-link" href="{{ route('report.options') }}">DB Mining</a></li>
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
        if($("#reportOpt").val() == '2')                                
        {
            $(".datefrom").show();
            $(".dateto").show();
        }
        else
        {
            $(".datefrom").hide();
            $(".dateto").hide();
        }
    }

    function dataMine()
    {
        $("#dataList").html('<div id="imgcenter" style="width:100%; height:100%"><img src="../../public/images/loading.gif"></div>');

        var repOption = $("#reportOpt").val();
        var fromDt = $("#datepicker1").val();
        var toDt = $("#datepicker2").val();

        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'GET',
           url:'/inv/shipping/report/datamine',
           data:{repOption:repOption, fromDt:fromDt, toDt:toDt},
           success:function(data){
               
                if(repOption == 1)
                {
                    var data = JSON.parse(data);
                    var h = "<h3>"+$("#reportOpt option:selected").html()+"</h3><br><br>";
                    var totMember = "<h5><b>Total Members To Date:</b> "+data.members+"</h5><br>";
                    var memberYesterday = "<h5><b>Members Added Yesterday:</b> "+data.membersYesterday+"</h5><br>";
                    var member7DaysAgo = "<h5><b>Members Added in last 7 Days:</b> "+data.membersLast7Days+"</h5>";

                    $("#dataList").html(h+totMember+memberYesterday+member7DaysAgo);

                }
            
           }
        });  
    }
    

    jQuery(document).ready(function($) {
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
