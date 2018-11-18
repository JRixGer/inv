<template>
<div class="col-md-12">
    <div v-if="loading">
        <div id="imgcenter" style="width:100%; height:100%"><img src="/inv/public/images/loading.gif"></div>
    </div>    
    <div v-if="!loading">     
    <table class="table-responsive" v-if="maro.length > 0" border="0">
        <tr v-for="(m, index) in maro">
            <td>
                {{ m.billing_fullName }}
            </td>
            <td>
                {{ m.billing_email }}
            </td>
            <td>
                {{ m.notifications_posted }}
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
                m: {
                    billing_fullName: '',
                    billing_email: '',
                    notifications_posted:''
                },                
                maro: [],
                loading: false
            }
        },        
        mounted()
        {
            this.readmaro();
        },
        methods: {
            readmaro()
            {
                this.loading = true;
                axios.get('/inv/shipping/maropost/mount')
                    .then(response => {
 
                        this.maro = response.data.maro;
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
  padding: 4px;
}
</style>

