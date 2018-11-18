<template>
<div class="col-md-12">
    <div v-if="loading">
        <div id="imgcenter" style="width:100%; height:100%"><img src="/inv/public/images/loading.gif"></div>
    </div>    
    <div v-if="!loading">   
    <table class="table-responsive" v-if="inv.length > 0" border="0">
        <tr v-for="(i, index) in inv">
            <td>
                {{ i.prodCode }}
            </td>
            <td>
                {{ i.prodName_common }}
            </td>
        </tr>
    </table>
    </div>
</div>
</template>
 
<script>

    export default {
        data(){
            return {
                i: {
                    prodCode: '',
                    prodName_common: ''
                },                
                inv: [],
                loading: false
            }
        },        
        mounted()
        {
            this.readRaw();
        },
        methods: {
            readRaw()
            {
                this.loading = true;
                axios.get('/inv/shipping/inventory/mount')
                    .then(response => {
 
                        this.inv = response.data.inv;
                        this.loading = false;
 
                });
            },
        }

    }

</script>
<style scoped>
.table-responsive {
    display: table;
}
td {
  font-size: 12px;
  padding:4px;
}
</style>

