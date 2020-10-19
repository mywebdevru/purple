const state = {
    authUser: false,
    userStatus: null,
};
const getters = {
    authUser: state => {
        return state.authUser;
    }
};
const actions = {
    async fetchAuthUser({commit}){
        commit("setAuthUserStatus", "loading");
        try {
            const authUser = (await axios.get('/api/auth-user')).data;
            commit("setAuthUser", authUser);
            commit("setAuthUserStatus", "success");
        } catch (error) {
            commit("setAuthUserStatus", "error");
        }
    }
};
const mutations = {
    setAuthUser(state, authUser) {
        state.authUser = authUser;
    },
    setAuthUserStatus(state, status) {
        state.authUserStatus = status;
    },

};

export default { state, getters, actions, mutations };
