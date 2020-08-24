import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes";
import storeDefinition from './store';
import "./components/_globals";
import Index from "./Index";
import BootstrapVue from "bootstrap-vue";

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

const app = new Vue({
    el: '#app',
    store,
    router,
});
