const state = {
    User: {
        id: null,
        name : null,
        email : null,
    },

    isLoggedIn: false,
};

const mutations = {
    setSource (state, source) {
        state.User.id = source.id
        state.User.name = source.name;
        state.User.email = source.email;
        state.User.status = source.status;
    },

    loggedIn (state) {
        state.isLoggedIn = true
    },

    loggedOut (state) {
        state.isLoggedIn = false
    }
};

const getters = {
    name: state => state.User.name,
    status: state => state.isLoggedIn,
    userId: state => state.User.id
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
};
