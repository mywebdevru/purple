const store = {
    title: '',
};
const getters = {
    pageTitle: state => state.title,
};
const actions = {
    setPageTitle({commit, state}, title){
        commit("setTitle", title);
    }
};
const mutations = {
    setTitle(state, title) {
        state.title = title + ' | Admin Panel';
        document.title = state.title;
    }
};

export default {store, actions, getters, mutations};
