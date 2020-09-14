const state = {
    user: null,
    userLoading: false,
};
const getters = {
    authUser: state => state.user,
    authUserLoading: state => state.userLoading,
};
const actions = {
    async fetchAuthUser({commit}) {
        commit("setAuthUserLoading", true);
        try {
            const user = (await axios.get('/api/auth-user')).data;
            commit("setAuthUser", user);
        } catch (error) {
            console.log(error);
        } finally {
            commit("setAuthUserLoading", false);
        }
    }

};
const mutations = {
    setAuthUser(state, user) {
        state.user = user;
    },
    setAuthUserLoading(state, loading) {
        state.userLoading = loading;
    },
};

export default {state, getters, actions, mutations};
