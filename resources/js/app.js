import VueRouter from 'vue-router'
import { routes } from './routes'
import App from './components/App'
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
    render: h => h(App)
})
.$mount('#app');
