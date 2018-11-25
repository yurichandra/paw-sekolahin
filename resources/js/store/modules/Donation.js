import Http from '../../http'

const state = {
    donations: [],
    donation: {}
}

const mutations = {
    setSource (state, data) {
        state.donations = data
    }
}

const actions = {
    getAllDonations ({ commit }) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                commit('setSource', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get('/api/donations', successCallback, errorCallback)
        })
    },

    SaveDonation(context, payload) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                resolve(res.data.data)
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.post('/api/donations',payload, successCallback, errorCallback)
        })
    },

    fetchByUser(context, id) {
        console.log("Donasi Data: ",id)
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setSource', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get(`/api/donations/by-user/${id}`, successCallback, errorCallback)
        })
    },

    verify(context, id) {
        return new Promise((resolve, reject) => {
            const successCallback = () => {
                context.dispatch('getAllDonations')
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get(`/api/verify-donation/${id}`, successCallback, errorCallback)
        })
    }

}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}
