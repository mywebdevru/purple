<template>
    <Layout>
        <div class="row">
            <UserBox class="col-6" />
        </div>
    </Layout>
</template>

<script>
import Layout from "../layouts/Main"
import UserBox from "../../components/Dashboard/UserBox";

export default {
    name: "Dashboard",
    page: {
        title: 'Dashboard',
        /*meta: [{ name: 'description', content: appConfig.description }],*/
    },
    components: {UserBox, Layout },
}
</script>

<style scoped>

</style>
