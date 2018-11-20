import Http from '../../http'

const state = {
    schools: [],
    school: {}
}

const mutations = {
    setSource(state, data) {
        state.schools = data
    },

    created(state, data) {
        state.schools.push(data)
    },

    setSchool(state, data) {
        state.school = data
    },
}

const actions = {
    getSchools({ commit }) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                commit('setSource', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get('/api/schools', successCallback, errorCallback)
        })
    },

    store (context, payload) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                if (res.status === 201) {
                    context.commit('created', res.data.data)
                    resolve()
                }
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.post('/api/schools', payload, successCallback, errorCallback)
        })
    },

    get (context, id) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setSchool', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get(`/api/schools/${id}`, successCallback, errorCallback)
        })
    },

    update (context, payload) {
        return new Promise((resolve, reject) => {
            const data = {
                name: payload.name,
                address: payload.address,
                telephone: payload.telephone
            }

            const successCallback = res => {
                if (res.status === 200) {
                    context.dispatch('getSchools')
                    resolve()
                }
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.patch(`/api/schools/${payload.id}`, data, successCallback, errorCallback)
        })
    },

    destroy (context, id) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                if (res.status === 200) {
                    context.dispatch('getSchools')
                    resolve()
                }
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.delete(`/api/schools/${id}`, successCallback, errorCallback)
        })
    }
}

export default {
    namespaced: true,
    actions,
    mutations,
    state
}
