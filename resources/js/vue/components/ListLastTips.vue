<template>
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table id="tabela_user" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" >Veículo</th>
                        <th scope="col" >Marca</th>
                        <th scope="col" >Modelo</th>
                       
                </tr>
                </thead>
                <tbody>
                        <tr v-for="tip in tips" :key="tip.id">
                            <td>{{tip.vehicle}}</td>
                            <td>{{tip.brand}}</td>
                            <td>{{tip.model}}</td>
                        </tr>

                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            tips:[]
        }
    },
    created(){
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('/api/lasttips')
                .then(response =>{
                    console.log(response.data);
                    this.tips = response.data
                })
            })
            .catch(function (error) {
                //console.error(error);
            });
    }
}
</script>

<style>
</style>
