import Vue from 'vue';
import Vuex from 'vuex';
import User from './modules/user';
import Chat from './modules/chat';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        User, Chat
    }
});
