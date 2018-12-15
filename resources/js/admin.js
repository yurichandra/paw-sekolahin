import VueRouter from 'vue-router'
import routes from './service/admin/routes'
import Admin from './components/Admin'
import Vue from 'vue'
import store from './store'
import Http from './http'
import auth from './auth'

Vue.use(VueRouter)

const router = new VueRouter({
    mode : 'history',
    routes
});

const doBeforeEach = (to, from, next) => {
    if (Http.getToken !== 'undefined') {
        try {
            next()
        } catch (err) {
            next({name: 'login'})
        }
    } else {
        next({ name: 'login' })
    }
}

router.beforeEach(doBeforeEach)

new Vue({
    el: '#app',
    store,
    router,
    render: h => h(Admin),

    created() {
        try {
            auth.refresh()
        } catch (err) {
            // Do nothing :))
        }
    }

})
.$mount('#app');
