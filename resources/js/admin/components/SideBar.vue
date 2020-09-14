<template>
    <!-- ========== Left Sidebar Start ========== -->
    <div>
        <div v-if="authUserLoading"></div>
        <div v-else class="left-side-menu">
            <VuePerfectScrollbar
                v-if="!isCondensed"
                v-once
                class="slimscroll-menu"
                :settings="settings"
            >
                <SideNav :authUser="authUser" />
            </VuePerfectScrollbar>
            <SideNav
                v-else
                :authUser="authUser"
                :authUserLoading="authUserLoading"
            />

            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->
    </div>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import SideNav from './SideNav'
import {mapGetters} from "vuex";
export default {
    name: "SideBar",
    components: { VuePerfectScrollbar, SideNav },
    props: {
        isCondensed: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            settings: {
                minScrollbarLength: 60,
            },
        }
    },
    methods: {},
    computed: {
        ...mapGetters({
            authUser: "authUser",
            authUserLoading: "authUserLoading",
        })
    },
}
</script>

<style scoped>

</style>
