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
                const user = res.data
                store.commit('LoggedUser/setSource', user.data);
                store.commit('LoggedUser/loggedIn')
                this.SaveEmail(payload.email)
                Http.setHeader(this.LoadCookie())
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
        this.DeleteCookie()
        Http.deleteHeader()
        store.commit('LoggedUser/setSource', {})
        store.commit('LoggedUser/loggedOut')
        store.commit('User/setSource', {})
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
