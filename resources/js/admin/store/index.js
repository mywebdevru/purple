import Vue from 'vue';
import Vuex from 'vuex';
import User from './modules/user';
import PageMeta from './modules/pageMeta';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        User, PageMeta
    },
});
