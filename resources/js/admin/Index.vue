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
    }
}
</script>

<style scoped>

</style>
