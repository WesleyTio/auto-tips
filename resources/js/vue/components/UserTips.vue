<template>
  <div id="list" class="row">
    <div class="col-12 m-2 ">
        <router-link to="/mytips/add">
            <a class="btn btn-outline-success">Adcionar Dica</a>
        </router-link>
    </div>
    <div class="table-responsive col-md-12">
        <table id="tabela_books" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" >Veiculo</th>
                    <th scope="col" >Marca</th>
                    <th scope="col" >Modelo</th>
                    <th scope="col" >Ação</th>
            </tr>
            </thead>
            <tbody>
                    <tr v-for="tip in tips" :key="tip.id">
                        <td>{{tip.vehicle}}</td>
                        <td>{{tip.brand}}</td>
                        <td>{{tip.model}}</td>
                        <td>
                            <div>
                                <router-link :to="`/mytips/${tip.id}`">
                                    <a class="btn btn-outline-warning mr-1" tabindex="-1" role="button" aria-disabled="true">Detalhes</a>
                                </router-link>
                                <router-link :to="`/mytips/${tip.id}/editar/true`">
                                    <a class="btn btn-outline-primary ml-1 mr-1" tabindex="-1" role="button" aria-disabled="true">Editar</a>
                                </router-link>
                                <a class="btn btn-outline-danger ml-1" tabindex="-1" role="button" aria-disabled="true" @click="deletar(tip.id)">Deletar</a>

                            </div>
                        </td>
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
        const id = localStorage.getItem('userId')
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get(`/api/usertips`)
                .then(response =>{
                    console.log(response.data);
                    this.tips = response.data
                })
            }).catch(function (error) {
                 this.$router.push('/login')
                console.error(error)
            });
    },
    methods: {
        deletar(id){
            axios.get("/sanctum/csrf-cookie").then((response) => {
                axios.delete(`/api/delete/${id}`)
                .then((response) => {
                    console.log(response.data);
                    //console.log(this.tips);
                    //const result = this.tips.find(tip => tip.id === id);
                    //this.tips.splice(this.tips.indexOf(result), 1)
                });
            })
            .catch(function (error) {
                console.error(error);
            });
        }
    }
}
</script>

<style>
</style>
