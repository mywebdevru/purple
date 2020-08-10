<template>
    <div>
        <div class="invalid-feedback"
             v-for="(error, index) in errors"
             :key="'error' + index">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    name: "ValidationErrors",
    props: {
        errors: Array,
    }
}
</script>

<style lang="sass" scoped>
.form-control.is-invalid ~ div > .invalid-feedback
    display: block
</style>
