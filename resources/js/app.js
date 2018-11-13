import Vue from 'vue'
import App from './components/App.vue'
import { routes } from './service/home/routes'
import store from './store'
import VueRouter from 'vue-router';

Vue.config.productionTip = false
Vue.use(VueRouter)

const router = new VueRouter({
    mode : 'history',
    routes
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
