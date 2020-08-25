import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./router/routes";
import storeDefinition from './state/store';
import "./components/_globals";
import Index from "./Index";
import BootstrapVue from "bootstrap-vue";
import dispatchActionForAllModules from './utils/dispatch-action-for-all-modules'

require('../bootstrap');

window.Vue = require('vue');
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(BootstrapVue);

window.flatpickr = require('flatpickr');
window.flatpickrRU = require("flatpickr/dist/l10n/ru.js").default.ru;

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("index", Index);

const store = new Vuex.Store(storeDefinition);
//dispatchActionForAllModules('init');

const app = new Vue({
    el: '#app',
    store,
    router,
});
