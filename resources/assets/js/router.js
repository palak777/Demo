
import App from './app.js';
import Demo from './components/demo.vue';
import Employee from './components/employee.vue';
import VueRouter from 'vue-router';


const router=new VueRouter({routes: routes});

Vue.use(VueRouter);


const routes=[
	{
		name :'Employee',
		path :'/',
		component:Employee
	}
];