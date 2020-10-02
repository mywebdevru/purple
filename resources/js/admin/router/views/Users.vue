<template>
<Layout>
    <Table>
    <Spinner class="my-5" v-if="loading" />
    <table id="datatable" class="table table-bordered dt-responsive table-striped nowrap" v-else>
        <thead>
        <tr>
            <th>Опции</th>
            <th>Имя</th>
            <th>Д/рождения</th>
            <th>Регистрация</th>
            <th>Город</th>
            <th>Страна</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(user, index) in users.data" :key="user.data.user_id" :id="`user-row-${user.data.user_id}`">
            <td>
                <button class="btn btn-icon btn-xs waves-effect waves-light btn-outline-success"> <i class="far fa-xs fa-eye"></i> </button>
                <button class="btn btn-icon btn-xs waves-effect waves-light btn-outline-info"> <i class="fas fa-xs fa-pen"></i> </button>
                <button @click.prevent="deleteUser(user.data.user_id, index)" class="btn btn-icon btn-xs waves-effect waves-light btn-outline-danger"> <i class="far fa-xs fa-trash-alt"></i> </button>
            </td>
            <td>{{ user.data.attributes.full_name }}</td>
            <td>{{ user.data.attributes.birth_date }}</td>
            <td>{{ user.data.attributes.created_at }}</td>
            <td class="user-city">{{ user.data.attributes.city }}</td>
            <td class="user-country">{{ user.data.attributes.country }}</td>
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
import * as pdfFonts from 'pdfmake/build/vfs_fonts';

export default {
    name: "Users",
    components: {Table, Spinner, Layout },
    data(){
        return {
            loading: false,
            userDeleting: false,
            users: [],
            table: null,
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
        }
    },
    methods: {
        deleteUser(user_id, index) {
            const self = this;
            swal({
                    title: "Уверен?",
                    text: "Удаление пользователя необратимо!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Да, удалить!",
                    cancelButtonText: "Отмена",
                    closeOnConfirm: true,
                },
                async function(){
                    self.userDeleting = true;
                    try {
                        await axios.delete('/api/users/delete', {data: {'user_id': user_id}});
                        self.table.destroy();
                        self.users.data.splice(index, 1);
                        swal("Готово!", "Пользователь был удален.", "success");
                    } catch (error) {
                        console.log(error);
                    } finally {
                        self.userDeleting = false;
                    }
                });
        }
    },
    updated() {
        pdfMake.vfs = pdfFonts.pdfMake.vfs;
        this.table = $("#datatable").DataTable({lengthChange: !0, buttons: ["copy", "print", "pdf", "csv"], keys: !0});
        this.table.buttons().container().appendTo("#datatable_wrapper .col-md-5:eq(0)");
    }
}
</script>

<style lang="sass" scoped>
.user-country
    max-width: 125px
    overflow: hidden
.user-city
    max-width: 100px
    overflow: hidden
.btn.btn-xs
    line-height: 1.125
    padding: .2rem .4rem
</style>
