import Http from '../../http'

const state = {
    schools: []
}

const mutations = {
    setSource(state, data) {
        state.schools = data
    },

    created(state, data) {
        state.schools.push(data)
    },

    // delete(state, index) {
    //     state.schools.splice(index, 1)
    // }
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

    destroy (context, id) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                if (res.status === 200) {
                    console.log('....Entering delete school method')
                    context.commit('delete', index)
                    resolve()
                }
                console.log('failed....')
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.delete(`/api/schools/` + id, successCallback, errorCallback)
        })
    }
}

export default {
    namespaced: true,
    actions,
    mutations,
    state
}
