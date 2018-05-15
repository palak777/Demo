
import Vue from 'vue';
import VueRouter from 'vue-router';
import Demo from './components/demo.vue';



import VueAxios from 'vue-axios';
import Axios from 'axios';


Vue.use(VueAxios,Axios);



new Vue(Vue.util.extend({ router },Demo)).$mount('#app');
