<template>
    <Layout>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center">
                    <a href="index.html">
                        <span><img src="/admin/logo-light.png" alt="" height="22"></span>
                    </a>
                    <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
                </div>
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center">
                            <h1 class="text-error">404</h1>
                            <h3 class="mt-3 mb-2">Страница не найдена</h3>
                            <p class="text-muted mb-3">
                                Похоже вы повернули не туда. Не проблема... такое случается и с лучшими из нас. Возможно, стоит проверить подключение к интернету. Вот небольшая подсказка, которая, поможет найти верный путь
                            </p>
                            <router-link tag="a" to="/admin" class="btn btn-danger waves-effect waves-light"><i class="fas fa-home mr-1"></i> Return to the Dashboard</router-link>

                        </div>


                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
        </div>
    </Layout>
</template>

<script>
import Layout from '../layouts/Auth';

export default {
    name: "NotFound",
    page: {
        title: '404',
        meta: [{ name: 'description', content: '404' }],
    },
    components: { Layout },
    props: {
        resource: {
            type: String,
            default: '',
        },
    },
}
</script>

<style scoped>
.title {
    text-align: center;
}
</style>
