<template>
    <b-card>
        <div class="dropdown float-right">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Управление</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Назначить роли</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Обновить</a>
            </div>
        </div>
        <h4 class="header-title mt-0 mb-3">Пользователи</h4>
        <div v-if="loading">
            <Spinner />
        </div>
        <div v-else>
            <DonutChart :data="data" :options="options" />
            <p class="card-text mt-3">
                <small class="text-muted">Всего пользователей: {{ total }}</small>
            </p>
        </div>
    </b-card>
</template>

<script>
import UserChart from "../Charts/DonutChart";
import Spinner from "../Spinner";
import DonutChart from "../Charts/DonutChart";

export default {
    name: "UserBox",
    components: {DonutChart, Spinner},
    data() {
        return {
            loading: false,
            total: null,
            data: {
                labels: ['Обычные пользователи', 'Админы', 'Супер-админы'],
                datasets: [{
                    data: [],
                    backgroundColor: ["#188ae2", "#10c469", "#f9c851"],
                    hoverBackgroundColor: ["#188ae2", "#10c469", "#f9c851"],
                    hoverBorderColor: "#fff"
                }]
            },
            options: {
                legend: {
                    labels: {
                        fontColor: '#fff'
                    }
                }
            }
        }
    },
    async mounted() {
        this.loading = true;
        try {
            const response = (await axios.get('/api/users-count')).data;
            this.total = response.data.count;
            const users = this.total - response.data.user_roles.admin - response.data.user_roles["super-admin"];
            this.data.datasets[0].data = [users, response.data.user_roles.admin, response.data.user_roles["super-admin"]];
        } catch (error) {
            console.log(error);
        } finally {
            this.loading = false;
        }
    }
}
</script>

<style scoped>

</style>
