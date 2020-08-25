<template>
    <Layout>

        <div class="row">
            <div class="col-md-12">
                <b-card>
                    This is dashboard page
                </b-card>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../layouts/Main"

export default {
    name: "Dashboard",
    page: {
        title: 'Dashboard',
        /*meta: [{ name: 'description', content: appConfig.description }],*/
    },
    components: { Layout },
}
</script>

<style scoped>

</style>
