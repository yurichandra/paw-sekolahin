import Http from '../../http'

const state = {
    user: {}
}

const mutations = {
    setSource(state, data) {
        state.user = data
    }
}

const actions = {
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
                // context.commit('LoggedUser/setSource', res.data.data)
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
