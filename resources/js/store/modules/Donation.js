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
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}
