require('./bootstrap');

window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Vuelidate from 'vuelidate';
import VueSwal from 'vue-sweetalert2';
import Axios from 'axios';

Vue.use(VueRouter,VueAxios,Axios);
Vue.use(Vuelidate);
Vue.use(VueSwal);

// import file yang dibuat tadi
import App from './components/App.vue';
import Read from './components/Read.vue';
import Home from './components/Home.vue';
import Create from './components/Create.vue';
import { create } from 'lodash';
Vue.prototype.$http = Axios;
Vue.prototype.$user = window.User;


// membuat router
const routes = [
    {
        name: 'read',
        path: '/profile/:id/gameCollection/all',
        component: Read
    },
    {
        name : 'home',
        path : '/profile/:id/gameCollection/list/:collection_id',
        component : Home
    },
    {
        name : 'create',
        path : '/profile/:id/gameCollection/create',
        component : Create
    }
    
   
]
new Vue ({
    validations: {}
})

const router = new VueRouter({ mode: 'history', routes: routes });
new Vue(Vue.util.extend({ router }, App)).$mount("#app");