import Vue from 'vue';
import Router from 'vue-router';
import Home from '../components/views/Home.vue';
import Login from '../components/views/Login.vue';
import Register from '../components/views/Register.vue';

Vue.use(Router);

export const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/home',
      component: Home
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/register',
      component: Register
    },
    {
      path: '/user-profile',
      name: 'profile',
      // lazy-loaded
      component: () => import('../components//Profile.vue')
    }
  ]
});
