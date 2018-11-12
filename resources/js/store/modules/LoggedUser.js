const state = {
    data: {
        name : "",
        email : "",
    }
};

const mutations = {
    setSource (state, source) {
        state.data.name = source.name
        state.data.email = source.email
    },
};

const getters = {
    name: state => state.data.name
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
}
