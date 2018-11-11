import VueRouter from 'vue-router'
import { routes } from './routes'
import App from './components/App'
import Vue from 'vue'

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history',
});

new Vue({
    el: '#app',
    router,
    render: h => h(App)
})
.$mount('#app');
