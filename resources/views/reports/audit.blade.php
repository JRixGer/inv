@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">
                    <div class="row">
                        <div class="col-md-4" style="padding-top:8px">
                        <h5 class="limit-text" style="font-weight:bold">CB & IS Active Members Cross Referencing (PWCP)</h5>
                        </div>  

                        <div class="col-md-1">
                            <div class="custom-control custom-checkbox" style="padding-top:5px; overflow: visible; white-space: nowrap;">
                                <input type="checkbox" class="custom-control-input" id="remMatch">
                                <label class="custom-control-label" for="remMatch">hide match</label>
                            </div>
                        </div>

                        <div class="col-md-1" >
                            <div class="input-group date showreport">
                            <button type="button" class="btn btn-info" onClick="audit()">Go</button>
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


                            <div id="datatabledivcrossref" class="horiz-scroll" style="max-width:auto; overflow: scroll;" >
                            <table class="table display" id="datatablecrossref" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th>CB_Name</th>
                                        <th>CB_Email</th>
                                        <th>CB_Dates</th>
                                        <th>CB_SKUs</th>
                                        <th>CB_ProductNames</th>
                                        <th>CB_Receipts</th>
                                        <th>IS_Name</th>
                                        <th>IS_Email</th>
                                        <th>IS_OrderDate</th>
                                        <th>IS_OrderTitle</th>
                                        <th>IS_ProductNames</th>
                                        <th>lnk_email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            </div>

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
