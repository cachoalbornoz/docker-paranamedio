import 'bootstrap';

// import jquery and select2
import $ from "jquery";
import select2 from 'select2';
window.$ = $; // <-- jquery must be set
select2(); // <-- select2 must be called

import axios from 'axios';
import jszip from 'jszip';
import pdfmake from 'pdfmake';

import DataTable from 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-responsive-bs5';
import 'datatables.net-scroller-bs5';
import 'datatables.net-select-bs5';


window.axios = axios;
window.DataTable = DataTable;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
