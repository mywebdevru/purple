<template>
<Layout>
    <Table>
    <Spinner class="my-5" v-if="loading" />
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
    </Table>
</Layout>
</template>

<script>
import Layout from "../layouts/Main";
import Spinner from "../../components/Spinner";
import Table from "../../components/Table";

export default {
    name: "Users",
    components: {Table, Spinner, Layout },
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
}
</script>

<style scoped>

</style>
