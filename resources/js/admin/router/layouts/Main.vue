<template>
    <div id="wrapper">
        <NavBar
            :authUser="authUser"
            :authUserLoading="authUserLoading"
            :title="title"
            :unreadNotificationsCount="unreadNotificationsCount"
            :unreadNotificationsCountLoading = "unreadNotificationsCountLoading"
            :unreadNotifications="unreadNotifications"
            :unreadNotificationsLoading = "unreadNotificationsLoading"

        />
        <SideBar
            :is-condensed="isMenuCondensed"
            :authUser="authUser"
            :authUserLoading="authUserLoading"
        />
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <slot />
                </div>
            </div>
            <Footer />
        </div>
        <RightBar
            :authUser="authUser"
            :authUserLoading="authUserLoading"
        />
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import SideBar from "../../components/SideBar";
import RightBar from "../../components/RightBar";
import Footer from "../../components/Footer";
import {mapGetters} from "vuex";

export default {
    name: "Main",
    components: { NavBar, SideBar, RightBar, Footer },
    data() {
        return {
            isMenuCondensed: false,
            title: this.$route ? this.$route.meta.title || '' : '',
        }
    },
    created: () => {
        document.body.classList.remove('authentication-bg')
    },
    computed: {
        ...mapGetters({
            authUser: "authUser",
            authUserLoading: "authUserLoading",
            unreadNotificationsCount: "unreadNotificationsCount",
            unreadNotificationsCountLoading: "unreadNotificationsCountLoading",
            unreadNotifications: "unreadNotifications",
            unreadNotificationsLoading: "unreadNotificationsLoading",
        }),
    },
    methods: {
        toggleMenu() {
            this.isMenuCondensed = !this.isMenuCondensed
            document.body.classList.toggle('sidebar-enable')
            if (
                !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Mobile|mobile|CriOS/i.test(
                    navigator.userAgent
                )
            )
                document.body.classList.toggle('enlarged')
        },
        toggleRightSidebar() {
            document.body.classList.toggle('right-bar-enabled')
        },
    },
}
</script>

<style scoped>

</style>
