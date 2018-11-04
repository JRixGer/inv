@extends('layouts.app')
@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_">SKU Management</div>

                <div class="card-body">
                  <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll">
                    <table class="table table-sm">
                      <thead>
                        <tr>

                          <th scope="col">CB SKU</th>
                          <th scope="col">CB SKU Grouping</th>
                          <th scope="col">Description</th>
                          <th scope="col">Description Grouping</th>
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
                                  <a class="btn btn-sm btn-info" onclick="load_sku('<?php echo $sku->id ?>', '<?php echo $sku->prodCode ?>','<?php echo $sku->prodName ?>', '<?php echo $sku->prodCode_grp ?>','<?php echo $sku->prodName_grp ?>')">Edit</a>
                                </td>
                                <td>
                                  <a class="btn btn-sm btn-warning">Delete</a>
                                </td>
	                           </tr>
                              @endforeach
                            @else
                            <tr>
                              <th colspan="3">No Records</th>
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
                        <label>Name:</label>
                        <input type="text" class="form-control" disabled id="pname_update">
                    </div>
                    <div class="form-group">
                        <label>Group Name:</label>
                        <input type="text" class="form-control" id="pname_grp_update">
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