    
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
<span class="float-right"><button @click="readInventory()" class="btn btn-sm btn-primary btn-xs pull-right">
                            + Add New Task</button></span>
                    </div>

                    <div class="card-body">
                             
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>
 
<script>

    export default {
        data(){
            return {
                inv: []
            }
        },

        methods: {
            
            readInventory()
            {
                axios.get('/inv/shipping/inventory/getinv')
                    .then(response => {
 
                        this.inv = response.data.inventory;
 
                    });
            },
        }    
    }



</script>




