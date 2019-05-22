/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



window.Vue = require('vue');
import Vuetify from 'vuetify'
import vueResource from 'vue-resource';
import 'vuetify/dist/vuetify.min.css'
import App from './App.vue'
import router from './router'
import VueIziToast from 'vue-izitoast';
 
import 'izitoast/dist/css/iziToast.css';

Vue.use(Vuetify);
Vue.use(VueIziToast);
Vue.use(vueResource);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('home-component', require('./components/Manufacturer.vue').default);
// Vue.component('model-component', require('./components/model.vue').default);
// Vue.component('inventory-component', require('./components/inventory.vue').default);
Vue.component('home-component', require('./App.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    render: h => h(App)
  }).$mount('#app')
