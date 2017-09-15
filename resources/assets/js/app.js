
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

<<<<<<< HEAD
Vue.component('example', require('./components/Example.vue'));



// const app = new Vue({ 
//    router,
//    store,
//    render: h => h(App), 
// }).$mount('#app');

<<<<<<< HEAD
 Vue.component('agendasearch', require('./components/AgendaPatientSearch.vue'));
 Vue.component('agendatimeblocks', require('./components/AgendaTimeblocks.vue'));
=======
=======
>>>>>>> 80afc646c1eac8e1b3604c52e35488f5e83a0aee

 const app = new Vue({
     el: '#app'
 });


<<<<<<< HEAD
// import Vue from 'vue';
// import AgendaPatientSearch from './components/AgendaPatientSearch.vue';
// new Vue({
//   el: '#app',
//   components: { AgendaPatientSearch }
// });
=======
new Vue({
  el: '#test',
  components: { Profile }
});
>>>>>>> 4b487473556c88b938e7079969dc9e636cbdbcd9
>>>>>>> 80afc646c1eac8e1b3604c52e35488f5e83a0aee
