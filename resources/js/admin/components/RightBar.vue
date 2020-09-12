<template>
    <div>
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a
                    href="javascript:void(0);"
                    class="right-bar-toggle float-right"
                    @click="hide"
                >
                    <i class="fe-x noti-icon"></i>
                </a>
                <h4 class="m-0 text-white">Settings</h4>
            </div>
            <div class="slimscroll-menu">
                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img
                            :src="authUser.data.attributes.avatar"
                            alt="user-img"
                            :title="authUser.data.attributes.name"
                            class="rounded-circle img-fluid"
                        />
                        <a href="javascript:void(0);" class="user-edit"
                        ><i class="mdi mdi-pencil"></i
                        ></a>
                    </div>

                    <h5><a href="javascript: void(0);">{{ authUser.data.attributes.full_name }}</a> </h5>
                    <p class="text-muted mb-0"><small>{{ authUser.data.attributes.roles[0] }}</small></p>
                </div>
            </div>
            <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
    </div>
</template>

<script>

import {mapGetters} from "vuex";

export default {
    name: "RightBar",
    components: {},
    methods: {
        hide() {
            this.$parent.toggleRightSidebar()
        },
    },
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
