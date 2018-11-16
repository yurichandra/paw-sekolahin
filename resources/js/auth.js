import Http from './http'
import store from './store'
import Cookie from 'js-cookie'
import Session from 'vue-session'

export default {
    authenticate (email, password) {
        return new Promise((resolve, reject) => {
            const payload = {
                email,
                password
            }

            const successCallback = (res) => {
                const user = res.data
                store.commit('LoggedUser/setSource', user.data)
                // this.setCookie(user.data.email)
                resolve()
            }

            const errorCallback = (err) => {
                reject(err)
            }

            Http.post('/api/login', payload, successCallback, errorCallback)
        })
    },

    register (email, name, password, confirmPassword) {
        return new Promise((resolve, reject) => {
            const payload = {
                email,
                name,
                password,
                confirmPassword
            }

            const successCallback =  (res) => {
                const data = res.data
                resolve()
            }

            const errorCallback = (err) => {
                reject(err)
            }

            Http.post('/api/users', payload, successCallback, errorCallback)
        })
    },

    logout () {
        this.deleteCookie();
        store.commit('LoggedUser/setSource', {});
    },

    setCookie (data) {
        Cookie.set('email', data);
    },

    getCookie () {
        return Cookie.get('email')
    },

    deleteCookie () {
        Cookie.remove('email')
    }
}
