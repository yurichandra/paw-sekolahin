import Http from '../../http'

const state = {
    user: {},
    users: []
}

const mutations = {
    setSource(state, data) {
        state.user = data
    },

    setUsers (state, data) {
        state.users = data
    }
}

const actions = {
    getUsers (context) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setUsers', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get('/api/users', successCallback, errorCallback)
        })
    },

    get (context, id) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setSource', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get(`/api/users/${id}`, successCallback, errorCallback)
        })
    },

    update (context, payload) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setSource', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.patch(`/api/users/${payload.id}`, payload, successCallback, errorCallback)
        })
    }
}

export default {
    namespaced: true,
    state,
    actions,
    mutations
}
