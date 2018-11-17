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
            };

            const successCallback = (res) => {
                const user = res.data
                store.commit('LoggedUser/setSource', user.data);
                // this.setCookie(user.data.email)
                this.SaveEmail(payload.email);
                resolve();
            };

            const errorCallback = (err) => {
                reject(err);
            };

            Http.post('/api/login', payload, successCallback, errorCallback);
        });
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
                const data = res.data;
                resolve();
            };

            const errorCallback = (err) => {
                reject(err);
            };

            Http.post('/api/users', payload, successCallback, errorCallback);
        });
    },

    logout () {
        this.DeleteCookie();
        store.commit('LoggedUser/setSource', {});
    },

    SaveEmail (email) {
        Cookie.set('email', email);
    },

    LoadCookie () {
        return Cookie.get('email');
    },

    DeleteCookie() {
        Cookie.remove('email');
    }
};
