import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
import VueAxios from 'vue-axios';
import axios from 'axios';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'



import Employee from './components/employee.vue';
import CreateEmployee from './components/CreateEmployee.vue';
import EditEmployee from './components/EditEmployee.vue';

Vue.use(VueAxios, axios);
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(VeeValidate);

const routes = [

  {
      name: 'employee',
      path: '/',
      component: Employee
  },
  {
      name: 'addEmployee',
      path: '/employees/add',
      component: CreateEmployee
  },
  {
      name: 'editEmployee',
      path: '/edit:id',
      component: EditEmployee
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
    router
});