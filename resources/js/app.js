import Vue from 'vue'
import App from './components/App.vue'
import routes from './service/home/routes'
import store from './store'
import VueRouter from 'vue-router'
import VueSession from 'vue-session'
import Http from './http'
import auth from './auth'

var options = {
  persist: true
}

Vue.use(VueSession, options);

Vue.use(VueRouter);

const router = new VueRouter({
    mode : 'history',
    routes
})

const doBeforeEach = ((to, from, next) => {
  if (Http.getToken !== 'undefined') {
    try {
      next()
    } catch (err) {
      next({ name: 'home' })
    }
  } else {
    next({ name: 'home' })
  }
})

router.beforeEach(doBeforeEach)

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
  render: h => h(App),

  created() {
    try {
      auth.refresh()
    } catch (err) {
      // Do nothing :))
    }
  }

}).$mount('#app');
