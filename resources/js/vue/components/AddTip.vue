<template>
    <div>
        <div class="row">
            <div id="formulario" class="col-8">
                <form method="POST" autocomplete="on">
                    <div class="form-group">
                        <label>Tipo de veículo:</label>
                        <select class="form-control" v-model="selectevehicle">
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
                            v-model="brand"
                            placeholder="Honda"
                        />
                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="model"
                            placeholder="Civic "
                        />
                    </div>
                    <div class="form-group">
                        <label>Versão:</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="version"
                            placeholder="Ex: turbo, cross, gasolina..."
                        />
                    </div>
                    <div class="form-group">
                        <label>Dica:</label>
                        <textarea
                            type="text"
                            class="form-control"
                            v-model="tip"
                            placeholder="Este livro conta..."
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-success"
                        style="width: 20%"
                        @click="save"
                    >
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

            brand: "",
            model: "",
            version: "",
            tip: "",
            selectevehicle: "",

        };
    },
    methods: {
        save(e) {
            e.preventDefault();
            //const id = localStorage.getItem('userId')
            axios
                .get("/sanctum/csrf-cookie")
                .then((response) => {
                    axios
                        .post("api/add", {
                            vehicle: this.vehicle,
                            brand: this.brand,
                            model: this.model,
                            version: this.version,
                            tip: this.tip,
                        })
                        .then((response) => {
                            console.log(response.data);
                            this.$router.go(-1);
                        })
                        .catch(function (error) {
                            console.error(error.data);
                        });
                })
                .catch(function (error) {
                    this.$router.push("/login");
                });
        },
    },
};
</script>

<style>
</style>
