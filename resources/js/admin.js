import VueRouter from 'vue-router'
import { routes } from './routes'
import Admin from './components/Admin'
import Vue from 'vue'
import store from './store'

Vue.use(VueRouter)

const router = new VueRouter({
    mode : 'history',
    routes
});

new Vue({
    el: '#app',
    store,
    router,
    render: h => h(Admin)
})
.$mount('#app');
