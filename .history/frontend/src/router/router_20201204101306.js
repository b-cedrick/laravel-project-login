import Vue from 'vue';
import Router from 'vue-router';
import Home from '../components/views/Home.vue';
import Login from '../components/views/Login.vue';
import Register from '../components/views/Register.vue';
import Profile from '../components/views/Profile.vue';

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
      component: () => import('../components/views/Register.vue')
    }
  ]  
});

router.beforeEach((to, from, next) => {
  const publicPages = ['/login', '/register', '/home'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = localStorage.getItem('user');

  // trying to access a restricted page + not logged in
  // redirect to login page
  if (authRequired && !loggedIn) {
    next('/login');
  } else {
    next();
  }
});

export default router
