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
        <UserChart />
        <p class="card-text">
            <small class="text-muted">Всего пользователей: 304</small>
        </p>
    </b-card>
</template>

<script>
import UserChart from "./UserChart";

export default {
    name: "UserBox",
    components: {UserChart},
    data() {
        return {
            loading: false,
            total: null,
            data: {
                labels: ['Обычные пользователи', 'Админы', 'Супер-админы'],
                datasets: [{
                    label: '# of Votes',
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
            this.total = response.total;
            const users = this.total - response.admin - response.super_admin;
            this.data.datasets.data = [users, response.admin, response.super_admin];
            console.log(this.data);
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
