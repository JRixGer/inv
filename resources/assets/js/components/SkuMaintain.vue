<template>
 <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                      <div class="row justify-content-between">
                        <div class="col-6">
                         SKU Maintenance
                        </div>
                        <div class="col-6"></div>
                      </div>
   
                </div>
                <div class="card-body">
                <div style="max-height:700px; max-width:auto; overflow: scroll;" class="horiz-scroll">
                         <table class="table table-bordered table-striped table-responsive" v-if="skus.length > 0">
                            <tbody>
                            <tr>
                              <th>#</th>
                              <th>CB SKU Raw</th>
                              <th>CB SKU Grouping</th>
                              <th>IS SKU Grouping</th>
                              <th>Description Raw</th>
                              <th>Description Grouping</th>
                              <th>Description (Shipping)</th>
                              <th colspan="2">ACTION</th>
                            </tr>
                            <tr v-for="(sku, index) in skus">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ sku.prodCode }}
                                </td>
                                <td>
                                    {{ sku.prodCode_grp }}
                                </td>                                
                                <td>
                                    {{ sku.prodCode_other }}
                                </td>                                
                                <td>
                                    {{ sku.prodName }}
                                </td>
                                <td>
                                    {{ sku.prodName_grp }}
                                </td>
                                <td>
                                    {{ sku.prodName_common }}
                                </td>
                                <td style="min-width:100px">
                                    <button @click="initUpdate(index)" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                    <button @click="deleteSku(index)" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                  
                </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="modal fade" tabindex="-1" role="dialog" id="update_sku_model">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Update SKU Qty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>


                    <div class="form-group">
                        <label>Code:</label>
                        <input type="text" class="form-control" v-model="update_sku.prodCode" disabled>
                    </div>
                    <div class="form-group">
                        <label>CB Code:</label>
                        <input type="text" class="form-control" v-model="update_sku.prodCode_grp">
                    </div>
                    <div class="form-group">
                        <label>IS Code:</label>
                        <input type="text" class="form-control" v-model="update_sku.prodCode_other">
                    </div>
                    <div class="form-group">
                        <label>Raw Name:</label>
                        <input type="text" class="form-control" v-model="update_sku.prodName" disabled>
                    </div>
                    <div class="form-group">
                        <label>Group Name:</label>
                        <input type="text" class="form-control" v-model="update_sku.prodName_grp">
                    </div>

                    <div class="form-group">
                        <label>Group Name (from shipping):</label>
                        <input type="text" class="form-control" v-model="update_sku.prodName_common">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" @click="updateSku" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>    
</template>
 
<script>

    toastr.options.timeOut = 1000; 
    toastr.options.closeButton = true;
    
    export default {
        data(){
            return {
                sku: {
                    prodCode: '',
                    prodCode_grp: '',
                    prodCode_other: '',
                    prodName: '',
                    prodName_grp: '',
                    prodName_common: ''
                },
                errors: [],
                skus: [],
                update_sku: {}
            }
        },
        mounted()
        {
            this.readSkus();
        },
        methods: {
            reset()
            {
                this.sku.prodCode = '';
                this.sku.prodCode_grp = '';
                this.sku.prodCode_other = '';
                this.sku.prodName = '';
                this.sku.prodName_grp = '';
                this.sku.prodName_common = '';                
            },
            initUpdate(index)
            {
                this.errors = [];
                $("#update_sku_model").modal("show");
                this.update_sku = this.skus[index];
            },
            readSkus()
            {
                axios.get('/inv/shipping/sku/mount')
                    .then(response => {
 
                        this.skus = response.data.skus;
 
                });
            },
            updateSku()
            {
                axios.post('/inv/shipping/sku/update_v/' + this.update_sku.id, {
                    cbpcode_grp: this.update_sku.prodCode_grp,
                    ispcode_grp: this.update_sku.prodCode_other,
                    pname_grp: this.update_sku.prodName_grp,
                    pname_common: this.update_sku.prodName_common
                })
                .then(response => {
                    toastr.success("Successfully updated.");
                    $("#update_sku_model").modal("hide");
                })
                .catch(error => {
                    this.errors = [];
                    console.log(error.response.data.message);

                    if (error.response.data.errors.name) {
                        this.errors.push('errors');
                    }

                    if (error.response.data.errors.description) {
                        this.errors.push('errors');
                    }
                    toastr.error(error.response.data.message);
                });
            },
            deleteSku(index)
            {
                let conf = confirm("Do you ready want to delete this task?");
                if (conf === true) {

                    axios.post('/inv/shipping/sku/delete/' + this.skus[index].id)
                        .then(response => {

                            console.log(response);
                            this.skus.splice(index, 1);
                        })
                        .catch(error => {

                        });
                }
            } 
        }

    }

</script>
<style>
.table-responsive {
    display: table;
}
</style>



