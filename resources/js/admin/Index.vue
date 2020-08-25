<template>
<div>
    <RouterView :key="$route.fullPath" />
</div>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
