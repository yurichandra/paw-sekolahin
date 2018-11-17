const state = {
    User: {
        name : null,
        email : null,
        status: null
    }
};

const mutations = {
    setSource (state, source) {
        state.User.name = source.name;
        state.User.email = source.email;
        state.User.status = source.status;
    },
};

const getters = {
    name: state => state.User.name
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
};
