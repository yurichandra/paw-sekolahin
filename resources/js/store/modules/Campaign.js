import Http from '../../http'

const state = {
    campaigns: [],
    campaign: {}
}

const mutations = {
    setSource(state, data) {
        state.campaigns = data
    },
    setDetail(state, data){
        state.campaign = data
    }
}

const actions = {
    getCampaigns({ commit }) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                commit('setSource', res.data.data);
                console.log(res.data.data[0].id);
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get('/api/campaigns', successCallback, errorCallback)
        })
    },

    fetchByUser (context, id) {
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setSource', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get(`/api/campaigns/by-user/${id}`, successCallback, errorCallback)
        })
    },

    store (context, payload) {
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
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setDetail', res.data.data)
                resolve()
            }

            const errorCallback = err => {
                reject(err)
            }

            Http.get(`/api/campaigns/${id}`, successCallback, errorCallback)
        })
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
