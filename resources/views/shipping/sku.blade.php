@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">


                    <div class="row">
                        <div class="col-md-6">
                             SKU Management
                        </div>
                        <div class="col-md-6 text-right">
                          <span class="float-right">
                          <form class="form-inline text-right">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                          </form>
                        </span>
                        </div>
                    </div>


                </div>

                <div class="card-body">
                  <!-- <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll"> -->
                  <div style="max-width:auto; overflow: scroll;" class="horiz-scroll">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">@sortablelink('prodCode','CB SKU Raw')</th>
                          <th scope="col">@sortablelink('prodCode_grp','CB SKU Grouping')</th>
                          <th scope="col">@sortablelink('prodName','Description Raw')</th>
                          <th scope="col">@sortablelink('prodName_grp','Description Grouping')</th>
                          <th scope="col">@sortablelink('prodName_common','Description (from shipping)')</th>
                          <th scope="col" colspan="2">ACTION</th>
                         </tr>
                      </thead>
                      <tbody>
                            
                            @if($skus->count() > 0)
                              @foreach($skus as $sku)
                              <tr>
                                <td>
                                  {{ $sku->prodCode }}
                                </td>
                                <td>
                                  {{ $sku->prodCode_grp }}
                                </td>                                
                                <td>
                                  {{ $sku->prodName }}
                                </td>
                                <td>
                                  {{ $sku->prodName_grp }}
                                </td>
                                <td>
                                  {{ $sku->prodName_common }}
                                </td>
                                <td>
                                  <a class="btn btn-sm btn-info" onclick="load_sku('<?php echo $sku->id ?>', '<?php echo $sku->prodCode ?>','<?php echo $sku->prodName ?>', '<?php echo $sku->prodCode_grp ?>','<?php echo $sku->prodName_grp ?>','<?php echo $sku->prodName_common ?>')"><i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                  <a class="btn btn-sm btn-warning"><i class="fa fa-trash-alt"></i></a>
                                </td>
	                           </tr>
                              @endforeach
                            <tr>
                              <td colspan="6">
                                
                                {{ $skus->appends(\Request::except('page'))->render() }}

                              </td>
                            </tr>                              
                            @else
                            <tr>
                              <th colspan="6">No Records</th>
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


<div class="modal fade" tabindex="-1" role="dialog" id="update_sku_model">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Update SKU Grouping</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Code:</label>
                        <input type="text" class="form-control" disabled id="pcode_update">
                        <input type="hidden" id="pid_update">
                    </div>
                    <div class="form-group">
                        <label>Group Code:</label>
                        <input type="text" class="form-control" id="pcode_grp_update">
                    </div>
                    <div class="form-group">
                        <label>Raw Name:</label>
                        <input type="text" class="form-control" disabled id="pname_update">
                    </div>
                    <div class="form-group">
                        <label>Group Name:</label>
                        <input type="text" class="form-control" id="pname_grp_update">
                    </div>

                    <div class="form-group">
                        <label>Name (from shipping):</label>
                        <input type="text" class="form-control" id="pname_common_update">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="effect_update_sku()">Submit</button>
                </div>


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection