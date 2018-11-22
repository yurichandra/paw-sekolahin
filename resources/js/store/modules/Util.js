const state = {
    ongoing: false
}

const mutations = {
    setOngoing(state, data) {
        console.log("State:", state.ongoing);
        state.ongoing = data;
    }
}

const getters = {
    ongoing: state => state.ongoing
}

const actions = {
    ChangeOngoing({ commit }, data){
        commit('setOngoing', data);
        return state.ongoing
    }
}


export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}
