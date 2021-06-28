<template>
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table id="tabela_user" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" >Nome</th>
                        <th scope="col" >Autor</th>
                        <th scope="col" >Descrição</th>
                </tr>
                </thead>
                <tbody>
                        <tr v-for="tip in tips" :key="tip.id">
                            <td>{{tip.tip}}</td>
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
            axios.get('/api/lastadd')
                .then(response =>{
                    //console.log(response.data)
                    //this.tips = response.data
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
