import Chartist from "chartist";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./material-kit/core/bootstrap-material-design.min');


// setTimeout(function() {
//   require('./material-kit/plugins/bootstrap-selectpicker');
// });
require('./material-kit/material-kit');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
import VueCookie from 'vue-cookie';
import VueAxios from 'vue-axios';
import axios from 'axios';

// router setup
import routes from './routes'

Vue.use(VueRouter);
Vue.use(VeeValidate, {
  events: "input|blur"
});
Vue.use(VueCookie);
Vue.use(VueAxios, axios);

axios.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  return Promise.reject(error);
});

import App from './App.vue';

const router = new VueRouter({
  mode: 'history',
  routes: routes,
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  }
});

window.vm = new Vue({
  el: '#app',
  render: h => h(App),
  router,
  data: {
    Chartist: Chartist,
    currentUser: {organization: {}}
  }
});

// window.vm = new Vue(Vue.util.extend({router}, App)).$mount('#app');