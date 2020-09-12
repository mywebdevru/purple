<template>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        <VuePerfectScrollbar
            v-if="!isCondensed"
            v-once
            class="slimscroll-menu"
            :settings="settings"
        >
            <SideNav :user="user" />
        </VuePerfectScrollbar>
        <SideNav
            v-else
            :user="user"
        />

        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import SideNav from './SideNav'
export default {
    name: "SideBar",
    components: { VuePerfectScrollbar, SideNav },
    props: {
        isCondensed: {
            type: Boolean,
            default: false,
        },
        user: {
            type: Object,
            required: false,
            default: () => ({}),
        },
    },
    data() {
        return {
            settings: {
                minScrollbarLength: 60,
            },
        }
    },
    computed: {
        ...authComputed,
    },
    methods: {},
}
</script>

<style scoped>

</style>
