/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
import VueCookie from 'vue-cookie';
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueRouter);
Vue.use(VeeValidate);
Vue.use(VueCookie);
Vue.use(VueAxios, axios);

axios.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  axios.get('/api/fails').then(function (data) {
    $("#fails").html(data.data);
  });
  return Promise.reject(error);
});

import App from './App.vue';
import ReviewCreateComponent from './components/ReviewCreateComponent.vue';
import ReviewCreateSuccessComponent from './components/ReviewCreateSuccessComponent';
import SellerShowComponent from './components/SellerShowComponent';

const routes = [
  {name: 'ReviewCreate', path: '/reviews/new', component: ReviewCreateComponent},
  {name: 'ReviewCreateSuccess', path: '/reviews/new/success', component: ReviewCreateSuccessComponent},
  {name: 'SellerShowComponent', path: '/sellers/:id', component: SellerShowComponent},
];

const router = new VueRouter({mode: 'history', routes: routes});
window.vm = new Vue(Vue.util.extend({router}, App)).$mount('#app');