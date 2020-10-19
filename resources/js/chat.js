import Vue from "vue";
import RightSidebar from "./components/RightSidebar";
import store from "./store";

const sidebar = new Vue({
    el: '#right-sidebar',
    components: {
        RightSidebar
    },
    store,
});
