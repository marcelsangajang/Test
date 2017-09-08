
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';   
import Vuex from 'vuex';

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
   
// import Router from 'vue-router';   
// import { sync } from 'vuex-router-sync';  
// import App from './App';   
// import VuexStore from './vuex/store';   
// import { routes } from './router-config';  
// Vue.use(Vuex);   
// Vue.use(Router);  
// const store = new Vuex.Store(VuexStore);  
// const router = new Router({
//    routes,
//    mode: 'history', 
// });  
	// sync(store, router);  

// Vue.use('Vuex');

Vue.component('example', require('./components/Example.vue'));



// const app = new Vue({ 
//    router,
//    store,
//    render: h => h(App), 
// }).$mount('#app');

