/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

let axios = require('axios');

import VueRouter from 'vue-router';
Vue.use(VueRouter)

let routes = [
   
    {path: '/map-view',  component: require('./components/Map.vue').default},
    

]

const router = new VueRouter({
    mode: 'history',
    routes,
})


const app = new Vue({
    el: '#app',
    router,
   
});
