<template>
<Layout>
    <Spinner class="mt-5" v-if="loading" />
    <table id="datatable" class="table table-bordered dt-responsive nowrap" v-else>
        <thead>
        <tr>
            <th>Имя</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users.data">
            <td>{{ user.data.attributes.full_name }}</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
        </tbody>
    </table>
</Layout>
</template>

<script>
import Layout from "../layouts/Main";
import 'jszip';
import 'pdfmake';
import 'datatables.net-bs4';
import 'datatables.net-buttons-bs4';
import 'datatables.net-keytable-bs4';
import 'datatables.net-responsive-bs4';
import 'datatables.net-select-bs4';
import Spinner from "../../components/Spinner";

export default {
    name: "Users",
    components: {Spinner, Layout },
    data(){
        return {
            loading: false,
            users: [],
        }
    },
    async mounted(){
        this.loading = true;
        try {
            this.users = (await axios.get('/api/users')).data;
        } catch (e) {
            console.log(e);
        } finally {
            this.loading = false;
            $("#datatable").DataTable();
        }
    },
    updated() {
        $("#datatable").DataTable();
    },
}
</script>

<style scoped>

</style>
