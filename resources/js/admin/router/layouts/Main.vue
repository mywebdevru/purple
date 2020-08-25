<template>
    <div id="wrapper">
        <NavBar
            :user="user"
            :title="title"
        />
        <SideBar
            :is-condensed="isMenuCondensed"
            :user="user"
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
        <RightBar />
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import SideBar from "../../components/SideBar";
import RightBar from "../../components/RightBar";
import Footer from "../../components/Footer";

export default {
    name: "Main",
    components: { NavBar, SideBar, RightBar, Footer },
    data() {
        return {
            isMenuCondensed: false,
            user: {},
            // user: this.$store ? this.$store.state.auth.currentUser : {} || {},
            title: this.$route ? this.$route.meta.title || '' : '',
        }
    },
    created: () => {
        document.body.classList.remove('authentication-bg')
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
