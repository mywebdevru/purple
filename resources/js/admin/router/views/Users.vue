<template>
<Layout>
<h1>Пользователи</h1>
</Layout>
</template>

<script>
import Layout from "../layouts/Main";

export default {
    name: "Users",
    components: { Layout },
    data(){
        return {
            loading: false,
            users: null,
        }
    },
    async mounted(){
        this.loading = true;
        try {
            this.users = (await axios.get('/api/users')).data;
        } catch (e) {
            console.log(e);
        } finally {
            this.loading = false;
        }
    }
}
</script>

<style scoped>

</style>
