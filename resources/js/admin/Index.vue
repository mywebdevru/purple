<template>
<div>
    <RouterView :key="$route.fullPath" />
</div>
</template>

<script>
export default {
    name: "Index",
    mounted() {
        this.$store.dispatch("fetchAuthUser");
        this.$store.dispatch("fetchUnreadNotificationsCount");
        this.$store.dispatch("fetchUnreadNotifications");

        Pusher.logToConsole = true;
        Echo.channel('my-channel')
            .listen('AdminPanelRealtimeNotification', (e) => {
                console.log('Before message')
                console.log(e.message);
            });
    },
    created() {
        this.$store.dispatch("setPageTitle", this.$route.meta.title);
    },
    watch: {
        $route(to) {
            this.$store.dispatch("setPageTitle", to.meta.title);
        }
    }
}
</script>

<style scoped>

</style>
