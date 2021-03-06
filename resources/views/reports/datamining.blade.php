@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">
                    <div class="row">
                        <div class="col-md-1" style="padding-top:8px">
                        <h5 class="limit-text" style="font-weight:bold">{{$reportName}}</h5>
                        <input type="hidden" id="reportSelected" value="{{$reportName}}">
                        </div>  
                        <div class="col-md-4">
                            <select class="form-control" id="reportOpt" onChange="showHide()">
                                <option value='0'>Manual Search by Email, Receipts</option>
                                <option value='1'>Added Members Information</option>
                                <option value='2'>Added Members Information by Date Range</option>
                                <option value='3'>Cancelation of Members</option>
                                <option value='8'>Cancelation of Members by Date Range</option>
                                <option value='4'>Display/Chart active vs Canceled Members</option>
                                <option value='5'>Rebills, Statistics on Rebills for Affiliates</option>
                                <option value='6'>Display Affiliates and the Amount of Members Added</option>
                                <?php
                                if($reportName == 'PWCP')
                                {
                                ?>
                                    <!-- <option value='7'>CB & IS Active Members Cross Referencing (PWCP)</option> -->
                                <?php
                                }    
                                ?>
                            </select>   
                        </div>  

                        <div class="col-md-2 transactiontype">
                            <div class="input-group date">
                                <select class="form-control" id="transactionType">

                                    @foreach($transtypes as $transtype)
                                        <option value="{{$transtype->transactionType}}">{{$transtype->transactionType}}</option>                                    
                                    @endforeach

                                </select>   
                                
                            </div>
                        </div>

                        <div class="col-md-1 datefilter">
                            <div class="input-group date">

                                <select class="form-control" id="dateFilter">
                                    <option value='ToDate'>To Date</option>
                                    <option value='Yesterday'>Yesterday</option>
                                    <option value='7Days'>Last 7 Days</option>                                    
                                </select>   

                            </div>
                        </div>
                        
                        <div class="col-md-1 datefrom">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="datepicker1" placeholder="From date">
                            </div>
                        </div>
                        <div class="col-md-1 dateto">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="datepicker2" placeholder="To date">
                            </div>
                        </div>
                        <div class="col-md-1 removeMatchCheckBox">
                            <div class="custom-control custom-checkbox" style="padding-top:5px; overflow: visible; white-space: nowrap;">
                                <input type="checkbox" class="custom-control-input" id="remMatch">
                                <label class="custom-control-label" for="remMatch">hide match</label>
                            </div>
                        </div>
                        <div class="col-md-2 manualSearch">
                            <div class="custom-control custom-checkbox">
                                <input type="text" class="form-control" id="manualSearch" placeholder="Type receipt# or email">
                            </div>
                        </div>                        
                        <div class="col-md-1" >
                            <div class="input-group date showreport">
                            <button type="button" class="btn btn-info" onClick="dataMine()">Go</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-body">
                    <div class="row" id="pwcp">
                        <div class="col-md-12" id="dataList" style="padding:30px; display:none">
                        <div id="summary">
                        </div> 
                        <hr>

                        <div id="datatablediv" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                        <table class="table display" id="datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Dates</th>
                                    <th>SKUs</th>
                                    <th>Product Names</th>
                                    <th>Receipts</th>
                                    <th>No Of ReBills</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>

                        <div id="datatabledivaff" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                        <table class="table display" id="datatableaff" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Affiliates</th>
                                    <th>Total Members</th>
                                    <th>Member Names</th>
                                    <th>Emails</th>
                                    <th>Dates</th>
                                    <th>SKUs</th>
                                    <th>Product Names</th>
                                    <th>Receipts</th>
                                    <th>No Of ReBills</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>

                        
                        <div id="manualSearchResults" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                                
                        </div>                        

                        </div>
                        <div class="col-md-12" id="spinner" style="padding:20px;">
                        </div>                        
                    </div>   

                    <!-- <div class="row" id="PIC">
                        <div class="col-md-12" id="dataListPIC" style="padding:30px; display:none">
                        <div id="summaryPIC">
                        </div> 
                        <hr>

                        <div id="datatabledivPIC" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                        <table class="table display" id="datatablePIC" style="width:100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Dates</th>
                                    <th>SKUs</th>
                                    <th>Product Names</th>
                                    <th>Receipts</th>
                                    <th>No Of ReBills</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>

                        <div id="datatabledivaffPIC" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                        <table class="table display" id="datatableaffPIC" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Affiliates</th>
                                    <th>Total Members</th>
                                    <th>Member Names</th>
                                    <th>Emails</th>
                                    <th>Dates</th>
                                    <th>SKUs</th>
                                    <th>Product Names</th>
                                    <th>Receipts</th>
                                    <th>No Of ReBills</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>

                        <div id="datatabledivcrossrefPIC" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                        <table class="table display" id="datatablecrossrefPIC" style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <th>CB_FirstName</th>
                                    <th>CB_LastName</th>
                                    <th>CB_Dates</th>
                                    <th>CB_SKUs</th>
                                    <th>CB_ProductNames</th>
                                    <th>CB_Receipts</th>
                                    <th>CB_NoOfReBills</th>
                                    <th>IS_FirstName</th>
                                    <th>IS_LastName</th>
                                    <th>IS_OrderDate</th>
                                    <th>IS_OrderTitle</th>
                                    <th>IS_ProductNames</th>
                                    <th>Lnk_Name</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                        

                        </div>
                        <div class="col-md-12" id="spinnerPIC" style="padding:20px;">
                        </div>                        
                    </div>    -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script>
        $(document).ready(function() {
            var $_GET = <?php echo json_encode($_GET); ?>;
            if($_GET['n'] > 0)
            {
                if($_GET['n']=='1' && $_GET['t']=='PWCP')
                    $("#reportOpt").val('4');
                else if($_GET['n']=='1' && $_GET['t']=='PIC')
                    $("#reportOpt").val('4');
                else if($_GET['n']=='2' && $_GET['t']=='PWCP')
                    $("#reportOpt").val('4');
                else if($_GET['n']=='2' && $_GET['t']=='PIC')
                    $("#reportOpt").val('4');
                else if($_GET['n']=='3' && $_GET['t']=='PWCP')
                    $("#reportOpt").val('6');
                else if($_GET['n']=='4' && $_GET['t']=='PWCP')
                    $("#reportOpt").val('6');        
                else if($_GET['n']=='5' && $_GET['t']=='PWCP')
                    $("#reportOpt").val('6');
                else if($_GET['n']=='5' && $_GET['t']=='PIC')
                    $("#reportOpt").val('6');                    

                $("#datepicker1").val('<?php echo '01/01/2019'; ?>');
                $("#datepicker2").val('<?php echo date('m/d/Y',strtotime('now')); ?>');
                $("#reportSelected").val($_GET['t']);
                window.history.pushState({}, document.title, "/" + "inv/shipping/report/options?t="+$_GET['t']);
                showHide();
                dataMine();
            }
        });
    </script>
@endsection
