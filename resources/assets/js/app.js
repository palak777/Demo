import Axios from 'axios';
import Vue from 'vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import VueToasted from 'vue-toasted';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import VeeValidate from 'vee-validate';
import Vuex from  'vuex';

import CreateEmployee from './components/CreateEmployee.vue';
import DisplayEmployee from './components/DisplayEmployee.vue';
import EditEmployee from './components/EditEmployee.vue';
import Employee from './components/employee.vue';
import Login from './components/login.vue';
import Register from './components/register.vue';
import Store from './store/index.js';


Vue.use(VueAxios, Axios);
Vue.use(VueRouter);
Vue.use(VeeValidate);
Vue.use(Vuetify);
Vue.use(VueToasted);
Vue.use(Vuex);


const routes = [

  {
    component: Login,
    name: 'login',
    path: '/'
  },
  {
    component: Register,
    name: 'register',
    path: '/user/register'
  },
  {
    component: Employee,
    name: 'employee',
    path: '/employees'
  },
  {
    component: CreateEmployee,
    name: 'addEmployee',
    path: '/employees/add',
    
  },
  {
    component: EditEmployee,
    name: 'editEmployee',
    path: '/edit:id'
  }

];

const router=new VueRouter({
	routes:routes
});

const app = new Vue({
    el: '#app',
    data(){
    	return {
    		routes:routes,
    	}
    },
    router,
    Store
});