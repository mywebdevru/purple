<template>
    <b-card>
        <div class="dropdown float-right">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
            </div>
        </div>
        <h4 class="header-title mt-0 mb-3">Users</h4>
        <UserChart />
    </b-card>
</template>

<script>
import UserChart from "./UserChart";

export default {
    name: "UserBox",
    components: {UserChart}
}
</script>

<style scoped>

</style>
