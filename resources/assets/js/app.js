/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';

Vue.use(VueRouter);
Vue.use(VeeValidate);

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

import App from './App.vue';
import ReviewCreateComponent from './components/ReviewCreateComponent.vue';
import ReviewCreateSuccessComponent from './components/ReviewCreateSuccessComponent';

const routes = [
  {name: 'ReviewCreateComponent', path: '/reviews/new', component: ReviewCreateComponent},
  {name: 'ReviewCreateSuccessComponent', path: '/reviews/new/success', component: ReviewCreateSuccessComponent}
];

const router = new VueRouter({mode: 'history', routes: routes});
new Vue(Vue.util.extend({router}, App)).$mount('#app');