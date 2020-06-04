/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/


import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Vuetify from 'vuetify'
import router from './router'
import bus from "./bus";
Vue.use(Vuetify,VueAxios, axios)
Vue.prototype.$bus = bus;


Vue.component('user', require('./views/user.vue'));       //user side 
const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify()
});