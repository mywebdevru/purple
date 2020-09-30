<template>
<div>
<slot />
</div>
</template>

<script>
import 'jszip';
import 'pdfmake';
import 'datatables.net-bs4';
import 'datatables.net-buttons-bs4';
import 'datatables.net-keytable-bs4';
import 'datatables.net-responsive-bs4';
import 'datatables.net-select-bs4';

export default {
    name: "Table",
    updated() {
        $("#datatable").DataTable();
    },
}
</script>

<style scoped>

</style>
