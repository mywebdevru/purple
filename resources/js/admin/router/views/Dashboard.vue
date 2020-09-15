<template>
    <Layout>
        <div class="row">
            <div class="col-md-12">
                <b-card>
                    This is dashboard page
                    <UserChart></UserChart>
                </b-card>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../layouts/Main"
import UserChart from "../../components/dashboard/UserChart";

export default {
    name: "Dashboard",
    page: {
        title: 'Dashboard',
        /*meta: [{ name: 'description', content: appConfig.description }],*/
    },
    components: { UserChart, Layout },
}
</script>

<style scoped>

</style>
