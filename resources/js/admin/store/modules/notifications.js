const state = {
    unreadNotificationsCount: null,
    unreadNotificationsCountLoading: false,
    unreadNotifications: {data: []},
    unreadNotificationsLoading: false,

};
const getters = {
    unreadNotificationsCount: state => state.unreadNotificationsCount,
    unreadNotificationsCountLoading: state => state.unreadNotificationsCountLoading,
    unreadNotifications: state => state.unreadNotifications,
    unreadNotificationsLoading: state => state.unreadNotificationsLoading,

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
    },
    async fetchUnreadNotifications({commit}) {
        commit("setUnreadNotificationsLoading", true);
        try {
            const notifications = (await axios.get('/api/notifications/unread')).data;
            commit("setUnreadNotifications", notifications);
        } catch (error) {
            console.log(error);
        } finally {
            commit("setUnreadNotificationsLoading", false);
        }
    }

};
const mutations = {
    setUnreadNotificationsCount(state, count) {
        state.unreadNotificationsCount = count;
    },
    setUnreadNotificationsCountLoading(state, loading) {
        state.unreadNotificationsCountLoading = loading;
    },
    setUnreadNotifications(state, response) {
        Vue.set(state.unreadNotifications, 'data', response.data);
    },
    setUnreadNotificationsLoading(state, loading) {
        state.unreadNotificationsLoading = loading;
    },
};

export default {state, getters, actions, mutations};
