<template>
    <div id="list" class="row">
        <div class="col-6 m-2 ">
           <form>
                <div class="input-group h2">
                    <input
                        name="data[search]"
                        class="form-control"
                        id="busca_user"
                        type="text"
                        placeholder="Filtre por veiculos, marcas ou modelos "
                        v-model="search"
                    />
                    <p>{{ filterVehicle }}</p>
                    <div class="input-group-append">
                        <span
                            class="input-group-text text-light"
                            style="background-color: #3cb371"
                        >
                            <i class="material-icons">search</i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive col-md-12">
            <table id="tabela_user" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" >Veículo</th>
                        <th scope="col" >Marca</th>
                        <th scope="col" >ModeloLO</th>
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
                                    <router-link :to="`/tip/${tip.id}`">
                                        <a class="btn btn-outline-success mr-1" tabindex="-1" role="button" aria-disabled="true">Ver dica</a>
                                    </router-link>

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
            tips:[],
            tipsFilter:[],
            search: ''
        }
    },
    created(){
        axios.get("/sanctum/csrf-cookie").then((response) => {
            axios.get('/api/tips')
                .then(response =>{
                    console.log(response.data);
                    this.tips = response.data
                    this.tipsFilter = response.data
                }).catch(function (error) {
                //console.error(error);
            });
        }).catch(function (error) {
                //console.error(error);
        });
    },
    methods: {
        isCaterogory(tip){
            //console.log(tip);

            if(tip.vehicle.toLowerCase() === this.search.toLowerCase()){
                console.log(this.search);
                return tip;
            }else if(tip.brand.toLowerCase() === this.search.toLowerCase()){
                return tip;
            }else if(tip.model.toLowerCase() === this.search.toLowerCase()){
                return tip;
            }
        }
    },
    computed: {
        filterVehicle(){
            if(this.search !== ""){
                this.tips =  this.tipsFilter.filter(this.isCaterogory);
            }else{
                this.tips = this.tipsFilter
            }


        }
    }
}
</script>

<style>
</style>
