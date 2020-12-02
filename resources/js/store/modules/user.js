const state = {
    authUser: false,
    authUserStatus: null,
    authUserFriends: [],
    authUserFriendsStatus: null,
};
const getters = {
    authUser: state => {
        return state.authUser;
    },
    authUserFriends: state => {
        return state.authUserFriends;
    },
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
    },

    async fetchAuthUserFriends({commit}){
        commit("setAuthUserFriendsStatus", "loading");
        try {
            const friends = (await axios.get('/api/auth-user-friends')).data;
            commit("setAuthUserFriends", friends);
            commit("setAuthUserFriendsStatus", "success");
        } catch (error) {
            commit("setAuthUserFriendsStatus", "error");
        }
    },
};
const mutations = {
    setAuthUser(state, authUser) {
        state.authUser = authUser;
    },
    setAuthUserFriends(state, friends) {
        state.authUserFriends = friends;
    },
    setAuthUserStatus(state, status) {
        state.authUserStatus = status;
    },
    setAuthUserFriendsStatus(state, status) {
        state.authUserFriendsStatus = status;
    },
};

export default { state, getters, actions, mutations };
