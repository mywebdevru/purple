<script>
import Layout from '../layouts/Main'
import Spinner from "../../components/Spinner";

export default {
    page: {
        title: 'Loading page...',
        meta: [{ name: 'description', content: 'Loading page...' }],
    },
    components: {Spinner, Layout },
}
</script>

<template>
    <Layout>
        <Transition appear>
            <Spinner />
        </Transition>
    </Layout>
</template>

<style lang="scss" module>
.loadingIcon {
    display: block;
    margin: 0 auto;

    // stylelint-disable-next-line selector-class-pattern
    &:global(.v-enter-active) {
        transition: opacity 1s;
    }
    // stylelint-disable-next-line selector-class-pattern
    &:global(.v-enter) {
        opacity: 0;
    }
}
</style>
