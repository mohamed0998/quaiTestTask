import DataTable from './DataTable.vue';

export default function registerGlobalDataTable(app) {
    app.component('data-table', DataTable);
}
