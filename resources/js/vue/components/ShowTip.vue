<template>
    <div class="row m-2">
        <div id="formulario" class="col-8" >
                <form method="POST" autocomplete="on">
                    <div class="form-group">
                        <label>Tipo de veículo:</label>
                        <select class="form-control" v-model="tip.selectevehicle">
                            <option v-bind:value="1">Moto</option>
                            <option v-bind:value="2">Carro</option>
                            <option v-bind:value="3">Caminhão</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Marca</label>
                        <label type="text" class="form-control" >{{tip.brand}}</label>

                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <label type="text" class="form-control" >{{tip.model}}</label>
                    </div>
                    <div class="form-group">
                        <label>Versão:</label>
                          <label type="text" class="form-control" >{{tip.version}}</label>
                    </div>
                    <div class="form-group">
                        <label>Dica:</label>
                        <label type="text" class="form-control" row >{{tip.tipText}}</label>
                    </div>
                </form>
            </div>

    </div>
</template>

<script>
export default {
    props: ["id"],
    data(){
        return{
            tip: []
        }
    },
    created(){
        axios
            .get("/sanctum/csrf-cookie")
                .then((response) => {
                    axios
                        .get(`api/edit/${this.id}`)
                        .then((response) => {
                            console.log(response.data);
                            this.tip = response.data
                        })
                        .catch(function (error) {
                            console.error(error.data);
                        });
                })
                .catch(function (error) {
                    console.error(error.data);
                    //this.$router.push("/login");
                });
    }

}
</script>

<style>

</style>
