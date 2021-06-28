<template>
    <div>
        <div class="justify-content-center container-fluid my-4 ">
        <ListLastTips></ListLastTips>
        </div>
    </div>
</template>

<script>

import ListLastTips from '../components/ListLastTips.vue'
export default {
    components: { ListLastTips },
    data(){
        return{

        }
    },
    mounted(){
        const logado = localStorage.getItem('isLoggedIn')
        if( logado === 'true'){
            axios.get('api/user').then((response) => {
                this.corruentUser = response.data
            }).catch((error) => {
                this.emitter.emit('isLoggedOff', false)
                this.$router.push('/login')
                console.error(error);
            })
        }

    }
}
</script>

<style>
</style>
