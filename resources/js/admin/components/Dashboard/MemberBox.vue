<template>
<div>
<b-card>
    <div class="dropdown float-right">
        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-dots-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- item-->
            <router-link :to="{name: 'users'}" class="dropdown-item">Управление</router-link>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">Клубы</a>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">Группы</a>
            <!-- item-->
            <a href="javascript:void(0);" @click.prevent="reload" class="dropdown-item">Обновить</a>
        </div>
    </div>
    <h4 class="header-title mt-0 mb-3">Участники</h4>
    <div v-if="loading">
        <Spinner />
    </div>
    <div v-else>
        <DonutChart :data="data" :options="options" />
        <p class="card-text mt-3">
            <small class="text-muted">Всего участников: {{ total }}</small>
        </p>
    </div>
</b-card>
</div>
</template>

<script>
import Spinner from "../Spinner";
import DonutChart from "../Charts/DonutChart";
export default {
    name: "MemberBox",
    components: {DonutChart, Spinner},
    data() {
        return {
            loading: false,
            total: null,
            data: {
                labels: ['Пользователи', 'Клубы', 'Группы'],
                datasets: [{
                    data: [],
                    backgroundColor: ["#ff8acc", "#5b69bc", "#f9c851"],
                    hoverBackgroundColor: ["#ff8acc", "#5b69bc", "#f9c851"],
                    hoverBorderColor: "#fff"
                }]
            },
            options: {
                legend: {
                    labels: {
                        fontColor: '#fff'
                    }
                }
            },
        }
    },
    methods: {
        async reload() {
            await this.fetchData();
        },
        async fetchData() {
            this.loading = true;
            try {
                const response = (await axios.get('/api/members-count')).data;
                this.total = response.data.count;
                this.data.datasets[0].data = Object.values(response.data.member_types);
            } catch (error) {
                console.log(error);
            } finally {
                this.loading = false;
            }
        }
    },
    async mounted() {
        await this.fetchData();
    }
}
</script>

<style scoped>

</style>
