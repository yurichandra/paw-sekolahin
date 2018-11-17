import Vue from 'vue';
import App from './components/App.vue';
import { routes } from './service/home/routes';
import store from './store';
import VueRouter from 'vue-router';

Vue.config.productionTip = false;
Vue.use(VueRouter);

const router = new VueRouter({
    mode : 'history',
    routes
});


router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.name) {
      // Start the route progress bar.
      console.log("nprogress start");
      NProgress.start();
  }
  next();
});

router.afterEach((to, from) => {
  // Complete the animation of the route progress bar.
  console.log("nprogress done");
  NProgress.done();
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
