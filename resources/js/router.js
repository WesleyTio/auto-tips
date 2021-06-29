import {createWebHistory, createRouter} from 'vue-router';

import Login from './Vue/pages/Login.vue'
import Register from './Vue/pages/Register.vue'
import Home from './Vue/pages/Home.vue'
import EditUser from './Vue/pages/EditUser.vue'
import Tips from './Vue/pages/Tips.vue'

import UserTips from './Vue/components/UserTips.vue'
import EditTip from './Vue/components/EditTip.vue'
import AddTip from './Vue/components/AddTip.vue'



export const routes = [
        {
            name: 'home',
            path: '/',
            component: Home

        },{
            name: 'login',
            path: '/login',
            component: Login

        },{
            name: 'register',
            path: '/register',
            component: Register
        },{
            name: 'edituser',
            path: '/edituser',
            component: EditUser
        },{
            name: 'mytip',
            path: '/mytips',
            component: Tips,
            props: true,
            children: [
                { path: '', component: UserTips, props: true},
                { path: 'add', component: AddTip, props: true},
                { path: ':id', component: EditTip, props: true},
                { path: ':id/editar/:edit', component: EditTip, props: true}
            ]
        }

];


const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
