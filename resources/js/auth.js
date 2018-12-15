import Http from './http'
import store from './store'
import Cookie from 'js-cookie'

export default {
    authenticate (email, password) {
        return new Promise((resolve, reject) => {
            const payload = {
                email,
                password
            };

            const successCallback = (res) => {
                const accessToken = {
                    username: res.data.data.email,
                    password: res.data.data.password
                }

                Http.setHeader(accessToken)
                store.commit('LoggedUser/loggedIn')
                this.saveToken(accessToken)
                this.whoami() 

                resolve();
            };

            const errorCallback = (err) => {
                reject(err);
            };

            Http.post('/api/login', payload, successCallback, errorCallback);
        });
    },

    /**
     * To determine which user is currently logged in.
     */
    whoami() {
        return new Promise((resolve, reject) => {
            const successCallback = (res) => {
                store.commit('LoggedUser/setSource', res.data.data)
                resolve()
            }

            const errorCallback = (err) => {
                reject(err)                
            }

            Http.get('/api/whoami', successCallback, errorCallback)
        })
    },

    /**
     * When user hit refresh button
     * apps continue to keep user logged in.
     */
    refresh() {
        const token = JSON.parse(this.getToken())
        Http.setHeader(token)
        this.whoami()
        store.commit('LoggedUser/loggedIn') 
    },

    register (email, name, password, confirmPassword) {
        return new Promise((resolve, reject) => {
            const payload = {
                email,
                name,
                password,
                confirmPassword
            };

            const successCallback =  (res) => {
                resolve();
            };

            const errorCallback = (err) => {
                reject(err);
            };

            Http.post('/api/users', payload, successCallback, errorCallback);
        });
    },

    logout () {
        this.deleteToken()
        store.commit('LoggedUser/setSource', {})
        store.commit('LoggedUser/loggedOut')
        store.commit('User/setSource', {})
    },

    saveToken (token) {
        Cookie.set('token', token);
    },

    getToken () {
        return Cookie.get('token') ? Cookie.get('token') : 'undefined'
    },

    deleteToken () {
        Cookie.remove('token');
    }
};
