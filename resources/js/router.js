import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Manufacturer.vue'
import Models from  './components/model.vue'
import Inventory from './components/Inventory.vue'
Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/manufacturers',
      name: 'manufacturers',
      component: Home
    },
    {
      path: '/models',
      name: 'models',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: Models
    },
    {
      path: '/inventory',
      name: 'inventory',
      component: Inventory
    },
  ]
})
