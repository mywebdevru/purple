import "metismenujs";

import VueRouter from "vue-router";
import router from "./router/routes";
import store from "./store";
import Index from "./Index";
import BootstrapVue from "bootstrap-vue";

require('../bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(BootstrapVue);

window.flatpickr = require('flatpickr');
window.flatpickrRU = require("flatpickr/dist/l10n/ru.js").default.ru;

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("index", Index);

const app = new Vue({
    el: '#app',
    store,
    router,
    mounted() {
        const target = document.getElementById('app-loading');
        target.remove();

        console.log(process.env.MIX_PUSHER_APP_CLUSTER);

        Pusher.logToConsole = true;
        Echo.channel('my-channel')
            .listen('AdminPanelRealtimeNotification', (e) => {
                console.log('Before message')
                console.log(e.message);
            });
        /*Pusher.logToConsole = true;
        var pusher = new Pusher('4ff599c52e3d67dea909', {
            encrypted: true,
            cluster: 'eu',
        });

// Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('my-channel');

// Bind a function to a Event (the full Laravel class)
        channel.bind('my-event', function(data) {
            console.log(data);
        });*/
    }
});
