<template>
    <div class="container-fluid d-flex justify-content-center h-100" style="margin-top: 10%" >
      <div class="card-body d-flex justify-content-center">
        <div class="alert alert-danger" role="alert" v-if="errors != null" style="align-self: center;">
                {{ errors }}
        </div>
        <div class="alert alert-success" role="alert" v-if="success != null" style="align-self: center;">
                {{ success }}
        </div>
        <p>{{validateEmail}}</p>
        <form  method="POST" autocomplete="on" >
            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" name="user_email"  class="form-control"
                    id="inputEmail" aria-describedby="emailHelp"
                    v-model="user.email"
                    placeholder="Enter email">
                <small id="msgemail" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputName">Nome:</label>
                <input type="text" name="user_name" class="form-control"
                v-model="user.name"
                placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Senha:</label>
                <input type="password" name="user_name" class="form-control"
                v-model="user.password"
                placeholder="password">
            </div>
            <button type="submit" class="btn btn-info " style="width: 100%;" @click="save"> Salvar </button>
        </form>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            user: {
                name: '',
                email: '',
                password: '',
            },
            emails:[],
            errors: null,
            success: null
        }
    },
    created(){
        axios.get('/sanctum/csrf-cookie').then(response =>{
                axios.get('api/edit')
                .then(response => {
                    console.log(response.data);
                    this.user.name = response.data.name
                    //this.user.email = response.data.email
                    this.emails = response.data.emails
                })
                .catch(function (error) {
                    console.error(error);
                });
            })
    },
    methods: {
        save(e){
            e.preventDefault()
            axios.get('/sanctum/csrf-cookie').then(response =>{
                axios.post('api/update', {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password
                })
                .then(response => {
                    console.log(response.data);
                    if (response.data.success) {
                        this.success = response.data.message
                        this.user.name = ''
                        this.user.email = ''
                        this.user.password = ''
                        //this.$router.push('/login')
                    }else{
                        this.errors = response.data.message
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });
            })
        }
    },
    computed:{
        validateEmail(){
            this.errors = null
            let validate = true
            this.emails.forEach(email => {
                if(this.user.email === email){
                    validate = false
                }
            });
            if(!validate){
                this.errors = 'email invalido use outro!!'
            }
        }
    }
}
</script>

<style>
</style>
