import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import Demo from './demo.vue';

import Employee from './components/employee.vue';
const routes = [

  {
      name: 'Employee',
      path: '/employees',
      component: Employee
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, Demo)).$mount('#app');