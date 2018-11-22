import Http from '../../http'

const state = {
    campaigns: [],
    campaign: {}
};

const mutations = {
    setSource(state, data) {
        state.campaigns = data
    },
    setDetail(state, data){
        state.campaign = data
    }
};

const actions = {
    getCampaigns({ commit }) {
        this.dispatch('Util/ChangeOngoing', true)
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                commit('setSource', res.data.data);
                this.dispatch('Util/ChangeOngoing', false)
                resolve();
            };

            const errorCallback = err => {
                this.dispatch('Util/ChangeOngoing', false)
                reject(err);
            };

            Http.get('/api/campaigns', successCallback, errorCallback);
        })
    },

    fetchByUser (context, id) {
        this.dispatch('Util/ChangeOngoing', true)
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                context.commit('setSource', res.data.data)
                this.dispatch('Util/ChangeOngoing', false)
                resolve();
            };

            const errorCallback = err => {
                this.dispatch('Util/ChangeOngoing', false)
                reject(err);
            };

            Http.get(`/api/campaigns/by-user/${id}`, successCallback, errorCallback);
        });
    },

    store (context, payload) {
        this.dispatch('Util/ChangeOngoing', true)
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                this.dispatch('Util/ChangeOngoing', false)
                resolve(res.data.data);
            };

            const errorCallback = err => {
                this.dispatch('Util/ChangeOngoing', false)
                reject(err);
            };

            Http.post('/api/campaigns', payload, successCallback, errorCallback);
        });
    },

    get(context, id) {
        this.dispatch('Util/ChangeOngoing', true)
        return new Promise((resolve, reject) => {
            const successCallback = res => {
                this.dispatch('Util/ChangeOngoing', false)
                context.commit('setDetail', res.data.data);
                resolve();
            };

            const errorCallback = err => {
                this.dispatch('Util/ChangeOngoing', false)
                reject(err);
            };

            Http.get(`/api/campaigns/${id}`, successCallback, errorCallback);
        });
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
