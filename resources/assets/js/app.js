
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('agendasearch', require('./components/AgendaPatientSearch.vue'));
 Vue.component('agendatimeblocks', require('./components/AgendaTimeblocks.vue'));
 // Vue.component('parkingpanel', require('./components/Parkingpanel.vue'));
 Vue.component('simplexcalendar', require('./components/SimplexCalendar.vue'));
 Vue.component('agenda-appointment', require('./components/agenda-appointment.vue'));

 const app = new Vue({
     el: '#app',
     data: {

     }
 });
