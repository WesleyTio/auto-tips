<template>
    <div>
        <div class="justify-content-center container-fluid my-4 ">
        <ListLastTips v-if="!userIsLoggedIn"></ListLastTips>
        <ListTips v-else></ListTips>
        </div>
    </div>
</template>

<script>

import ListLastTips from '../components/ListLastTips.vue'
import ListTips from '../components/ListTips.vue'
export default {
    components: { ListLastTips, ListTips },
    data(){
        return{
            userIsLoggedIn: false
        }
    },
    mounted(){
        this.emitter.on('isLoggedOff', isLoggedIn => {
            if(isLoggedIn){
                this.userIsLoggedIn = false
            }
        });
        if(localStorage.getItem('isLoggedIn')){
            this.userIsLoggedIn = true
            axios.get('api/user').then((response) => {
            }).catch((error) => {
                this.emitter.emit('isLoggedIn', false)
                this.$router.push('/login')
                console.error(error);
            })
        }



    }
}
</script>

<style>
</style>
