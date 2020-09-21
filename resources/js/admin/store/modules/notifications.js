const state = {
    unreadNotificationsCount: null,
    unreadNotificationsCountLoading: false,
};
const getters = {
    unreadNotificationsCount: state => state.unreadNotificationsCount,
    unreadNotificationsCountLoading: state => state.unreadNotificationsCountLoading,
};
const actions = {
    async fetchUnreadNotificationsCount({commit}) {
        commit("setUnreadNotificationsCountLoading", true);
        try {
            const count = (await axios.get('/api/notifications/unread-count')).data.count;
            commit("setUnreadNotificationsCount", count);
        } catch (error) {
            console.log(error);
        } finally {
            commit("setUnreadNotificationsCountLoading", false);
        }
    }
};
const mutations = {
    setUnreadNotificationsCount(state, count) {
        state.unreadNotificationsCount = count;
    },
    setUnreadNotificationsCountLoading(state, loading) {
        state.unreadNotificationsCountLoading = loading;
    }
};

export default {state, getters, actions, mutations};
