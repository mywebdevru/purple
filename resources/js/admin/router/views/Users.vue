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
    async mounted(){
        try {
            const response = (await axios.get('/api/users')).data;
            console.log(response);
        } catch (e) {

        }
    }
}
</script>

<style scoped>

</style>
