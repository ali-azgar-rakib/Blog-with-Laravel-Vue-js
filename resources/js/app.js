require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';

// filter  
import filter from './filter'

// vuex 
import Vuex from 'vuex'
Vue.use(Vuex);

import storeData from './store/index'

const store = new Vuex.Store(
    storeData
);



// vue router 
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import { routes } from './routes'

Vue.component('template-main', require('./components/admin/AdminMain.vue').default);

// vform 
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// sweet alert 2   
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;
// editor 

import Editor from 'v-markdown-editor'
Vue.use(Editor)

const router = new VueRouter({
    routes,
    mode: 'hash'

});

const app = new Vue({
    el: '#app',
    router,
    store

});
