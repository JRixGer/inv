@extends('layouts.app')
@section('content')

<div id="fields" style="display: none;">
  <div class="row" style="margin-bottom: 5px;">
      <div class="col-md-3">
        <input type="hidden" id="record_id" name="record_id[]" value="NA">
        <input type="text" class="form-control" id="offer_id" name="offer_id[]" required="" autocomplete="off">
      </div>
      <div class="col-md-3">
            <input type="text" class="form-control" id="sku" name="sku[]" required="" autocomplete="off">
      </div>
      <div class="col-md-2">
            <input type="text" class="form-control" id="goal_id" name="goal_id[]" required=""  autocomplete="off">             
      </div>
      <div class="col-md-3">
            <input type="text" class="form-control" id="type" name="type[]" value="UPSELL" required="" autocomplete="off">
      </div>
      <div class="col-md-1">
        <a href="#" class="cmdX">X</a>
      </div>
  </div>
</div>

<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_" style="padding: 0.35rem 1.25rem;">
                  HasOffer Goals
                </div>
                <div class="card-body">

                  
                  <div class="row">
                    <br>
                    <div class="col-md-6" id="tbl_sku_goals">

                    </div>

                    <div class="col-md-5"  style="float: left;">
                      <br>
                      <form id="frmSkuGoals">
                        @csrf
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="offer_id">Offer ID</label>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="sku">SKU</label>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                   <div class="form-group">
                                    <label for="goal_id">Goal ID</label>
                                  </div>                
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="type">TYPE</label>
                                  </div> 
                              </div>
                             <div class="col-md-1">
                                  <div class="form-group">
                                    <button type="button" class="btn btn-secondary btn-sm float-right" id="btnAddRow">Add</button>
                                  </div> 
                              </div>
                              
                              <br>
                          </div>
                          <div id="frmSkuGoalRow">
                          </div>
                        <div>
                          <button type="submit" class="btn btn-primary float-left">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(document).on('submit', '#frmSkuGoals', function(e){
      event.preventDefault();

      // $.ajaxSetup({
      //     headers: {

      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });

      data = $(this).serialize();
      console.log(data);

        $.ajax({
            type: 'POST',
            url: "{{ route('sku.save_goals') }}",
            data: data,
            dataType: 'json',
            success: function(data){   

                if(data.status){
                  show_table();
                  $("#frmSkuGoalRow").html('');
                  addRow();
                }else{
                  console.log(data);
                  alert('Error!');
                }
                

            },
            error: function(jqXhr){
                console.log(jqXhr);

            }
        });

      // alert('submitted!');
    });


    show_table();
    function show_table()
    {
        $("#tbl_sku_goals").html('loading...');
        $.get("{{ route('sku.tbl_goals') }}",function(data){
            $("#tbl_sku_goals").html(data);
        });
    }

    addRow();
    function addRow()
    {
      $field = $("#fields").html();
      $("#frmSkuGoalRow").append($field);
    }

    $(document).on('click',"#btnAddRow", function(){
      addRow();
    });


    $(document).on('click','.btnDelete', function(){
       var id = $(this).parent().data('id');
       var row = $(this).parent().parent();
       var result = confirm('Are you sure to Delete the selected record?');
       if(result){

          $.get("{{ route('sku.delete_goals') }}", {id:id},function(data){
            console.log(data);
            if(data){
              alert('Deleted Successfully!');
              row.fadeOut();
            }else{
              alert('Failed to Delete');
            }
          });

       }
       else{
        alert('cancelled');
       }
    });

    $(document).on('click', '.cmdX', function(){
        $(this).parent().parent().fadeOut(500, function() { $(this).remove(); });
    });

    $(document).on('click','.btnEdit', function(){

      var id = $(this).parent().data('id');
      var offer_id = $(this).parent().parent().find('td:eq(0)').text();
      var goal_id = $(this).parent().parent().find('td:eq(2)').text();
      var type = $(this).parent().parent().find('td:eq(3)').text();
      var sku = $(this).parent().parent().find('td:eq(1)').text();
      $("#frmSkuGoalRow").html('');
      addRow();

      $("input[name^=record_id]:eq(1)").val(id);
      $("input[name^=offer_id]:eq(1)").val(offer_id);
      $("input[name^=sku]:eq(1)").val(sku);
      $("input[name^=goal_id]:eq(1)").val(goal_id);
      $("input[name^=type]:eq(1)").val(type);

    }); 
  </script>
@endsection

