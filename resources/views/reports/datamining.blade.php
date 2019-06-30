@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">
                    <div class="row">
                        <div class="col-md-1" style="padding-top:8px">
                        <h5 class="limit-text">DB Mining  </h5>
                        </div>  
                        <div class="col-md-3">
                            <select class="form-control" id="reportOpt" onChange="showHide()">
                                <option value='1'>Added Members Information</option>
                                <option value='2'>Added Members Information by Date Range</option>
                                <option value='3'>Cancelation of Members</option>
                                <option value='4'>Display/Chart active vs Canceled Members</option>
                                <option value='5'>Rebills, Statistics on Rebills for Affiliates</option>
                                <option value='6'>Display Affiliates and the Amount of Members Added</option>
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
                        <div class="col-md-1" >
                            <div class="input-group date showreport">
                            <button type="button" class="btn btn-info" onClick="dataMine()">Go</button>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="dataList" style="padding:30px; display:none">
                        <div id="summary">
                        </div> 
                        <hr>
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
                        <div class="col-md-12" id="spinner" style="padding:20px;">
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script>

  
    </script>
@endsection
