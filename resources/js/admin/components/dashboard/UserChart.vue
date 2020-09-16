<script>
import { Doughnut } from 'vue-chartjs';

export default {
    extends: Doughnut,
    data() {
        return {
            data: {
                labels: ['Обычные пользователи', 'Админы', 'Супер-админы'],
                datasets: [{
                    label: '# of Votes',
                    data: [302, 1, 1],
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
    mounted () {
        this.renderChart(this.data, this.options)
    },

name: "UserChart"
}
</script>

<style scoped>

</style>
