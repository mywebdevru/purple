<template>
    <Layout>
        <div class="row">
            <UserBox class="col-6" />
            <MemberBox class="col-6" />
        </div>
    </Layout>
</template>

<script>
import Layout from "../layouts/Main"
import UserBox from "../../components/Dashboard/UserBox";
import MemberBox from "../../components/Dashboard/MemberBox";

export default {
    name: "Dashboard",
    page: {
        title: 'Dashboard',
        /*meta: [{ name: 'description', content: appConfig.description }],*/
    },
    components: {MemberBox, UserBox, Layout },
}
</script>

<style scoped>

</style>
