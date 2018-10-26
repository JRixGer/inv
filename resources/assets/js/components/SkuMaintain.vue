    
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
                                <th>
                                    #
                                </th>
                                <th>
                                    Product Code
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Qty
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>

                            <tr v-for="(sku, index) in skus">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ sku.prodCode }}
                                </td>
                                <td>
                                    {{ sku.prodName }}
                                </td>

                                <td>
                                    {{ sku.prodQty }}
                                </td>
                                <td>
                                    {{ sku.prodType }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-sm">Edit Qty</button>
                                    <button @click="deleteSku(index)" class="btn btn-danger btn-sm">Delete</button>

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
                        <input type="text" class="form-control"
                               v-model="update_sku.prodCode" disabled>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control"
                               v-model="update_sku.prodName" disabled>
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <input type="text" class="form-control"
                               v-model="update_sku.prodType" disabled>
                    </div>
                    <div class="form-group">
                        <label>Qty:</label>
                        <input type="text" class="form-control"
                               v-model="update_sku.prodQty">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" @click="updateSku" class="btn btn-primary">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>    
</template>
 
<script>

    //toastr.options.timeOut = 1000; 
    //toastr.options.closeButton = true;
    
    export default {
        data(){
            return {
                sku: {
                    prodCode: '',
                    prodName: '',
                    prodQty: '',
                    prodType: ''
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
                this.sku.prodName = '';
                this.sku.prodQty = '';
                this.sku.prodType = '';                
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
                axios.post('/inv/shipping/sku/update/' + this.update_sku.id, {
                    prodQty: this.update_sku.prodQty
                })
                .then(response => {

                    $("#update_sku_model").modal("hide");
                })
                
                .catch(error => {
                    this.errors = [];
                    if (error.response.data.errors.name) {
                        this.errors.push('errors');
                    }

                    if (error.response.data.errors.description) {
                        this.errors.push('errors');
                    }
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



