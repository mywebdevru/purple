<template>
<div class="mt-3 row">
<div class="col-12">
<div class="card-box">
<slot />
</div>
</div>
</div>
</template>

<script>
import 'jszip';
import 'pdfmake';
import 'datatables.net-bs4';
import 'datatables.net-buttons-bs4';
import 'datatables.net-buttons/js/buttons.html5.js';
import 'datatables.net-buttons/js/buttons.colVis.js';
import 'datatables.net-buttons/js/buttons.flash.js';
import 'datatables.net-buttons/js/buttons.print.js';
import 'datatables.net-keytable-bs4';
import 'datatables.net-responsive-bs4';
import 'datatables.net-select-bs4';

export default {
    name: "Table",
}
</script>

<style lang="sass" scoped>

</style>
