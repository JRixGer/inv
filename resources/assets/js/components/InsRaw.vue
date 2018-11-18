<template>
<div class="col-md-12">
    <div v-if="loading">
        <div id="imgcenter" style="width:100%; height:100%"><img src="/inv/public/images/loading.gif"></div>
    </div>    
    <div v-if="!loading">
        <table class="table-responsive" v-if="raw.length > 0" border="0">
            <tr v-for="(i, index) in raw">
                <td>
                    {{ i.billing_fullName }}
                </td>
                <td>
                    {{ i.billing_email }}
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
                    billing_fullName: '',
                    billing_email: ''
                },                 
                raw: [],
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
                axios.get('/inv/shipping/notifications/mount')
                    .then(response => {
 
                        this.raw = response.data.raw;
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


