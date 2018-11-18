import Http from '../../http'

const state = {
    campaigns: []
}

const mutations = {
    setSource(state, data) {
        state.campaigns = data
    }
}

const actions = {
    getCampaigns({ commit }) {
        return new Promise((resolve, error) => {
            const successCallback = res => {
                commit('setSource', res.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get('/api/campaigns', successCallback, errorCallback)
        })
    }
}

export default {
    namespaced: true,
    actions,
    mutations,
    state
}
