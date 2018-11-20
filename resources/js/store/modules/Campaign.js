import Http from '../../http'

const state = {
    campaigns: [],
    campaign: {}
}

const mutations = {
    setSource(state, data) {
        state.campaigns = data
    }
}

const actions = {
    getCampaigns({ commit }) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                commit('setSource', res.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get('/api/campaigns', successCallback, errorCallback)
        })
    },

    store(context, payload) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                resolve(res.data.data)
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.post('/api/campaigns', payload, successCallback, errorCallback)
        })
    },

    get(context, id) {

    },

    update(context, payload) {

    },

    destroy(context, id) {

    }
}

export default {
    namespaced: true,
    actions,
    mutations,
    state
}
