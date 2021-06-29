<template>
    <div>
        <div class="row m-2">
            <div id="formulario" class="col-8" v-if="editing">
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
                        <input
                            type="text"
                            class="form-control"
                            v-model="tip.brand"
                            placeholder="Honda"
                        />
                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="tip.model"
                            placeholder="Civic "
                        />
                    </div>
                    <div class="form-group">
                        <label>Versão:</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="tip.version"
                            placeholder="Ex: turbo, cross, gasolina..."
                        />
                    </div>
                    <div class="form-group">
                        <label>Dica:</label>
                        <textarea
                            type="text"
                            class="form-control"
                            v-model="tip.tipText"
                            placeholder="Este livro conta..."
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-success"
                        style="width: 20%"
                        @click="alterar"
                    >
                        Alterar Dica
                    </button>
                </form>
            </div>
            <div id="formulario" class="col-8" v-else>
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
    </div>
</template>

<script>
export default {
   props: ["id", "edit"],
    data() {
        return {
            editing:false,
            tip: [],
        };
    },
    created(){
        if(this.edit === "true"){
            this.editing = true
        }
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

    },
    methods: {
        alterar(e) {
            e.preventDefault();
            //const id = localStorage.getItem('userId')
            axios
                .get("/sanctum/csrf-cookie")
                .then((response) => {
                    axios
                        .post(`api/update/${this.id}`, {
                            vehicle: this.tip.selectevehicle,
                            brand: this.tip.brand,
                            model: this.tip.model,
                            version: this.tip.version,
                            tip: this.tip.tipText,
                        })
                        .then((response) => {
                            console.log(response.data);
                            alert(response.data.message)
                            this.$router.go(-1);
                        })
                        .catch(function (error) {
                            console.error(error.data);
                        });
                }).catch(function (error) {
                    console.error(error);
                    //this.$router.push("/login");
                });
        },
    },

}
</script>

<style>

</style>
