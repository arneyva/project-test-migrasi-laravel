import { ModuleRegistry, createGrid } from 'ag-grid-community';
import { AllEnterpriseModule, LicenseManager } from 'ag-grid-enterprise';

import 'ag-grid-community/styles/ag-grid.css';
import 'ag-grid-community/styles/ag-theme-quartz.css';

ModuleRegistry.registerModules([AllEnterpriseModule]);

LicenseManager.setLicenseKey('[TRIAL]_this_{AG_Charts_and_AG_Grid}_Enterprise_key_{AG-090575}_is_granted_for_evaluation_only___Use_in_production_is_not_permitted___Please_report_misuse_to_legal@ag-grid.com___For_help_with_purchasing_a_production_key_please_contact_info@ag-grid.com___You_are_granted_a_{Single_Application}_Developer_License_for_one_application_only___All_Front-End_JavaScript_developers_working_on_the_application_would_need_to_be_licensed___This_key_will_deactivate_on_{14 August 2025}____[v3]_[0102]_MTc1NTEyNjAwMDAwMA==2bf724e243e12a2673a0da27840ab6db');

const columnDefs = [
  { field: 'id' },
  { field: 'nama', headerName: 'Nama Barang' },
  { field: 'kode', headerName: 'Kode Barang' },
  {
    field: 'harga',
    headerName: 'Harga',
    valueFormatter: (params) =>
      parseFloat(params.value).toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR',
      }),
  },
  {
    field: 'created_at',
    headerName: 'Tanggal Input',
    valueFormatter: (params) => params.value?.split('T')[0],
  },
];

const gridOptions = {
  columnDefs,
  defaultColDef: {
    flex: 1,
    sortable: true,
    filter: true,
    resizable: true,
    enableValue: true,
    enableRowGroup: true,
    enablePivot: true,
  },
  autoGroupColumnDef: {
    minWidth: 200,
    pinned: "left",
  },
  pivotMode: true, // Aktifkan Pivot Mode default
  pivotPanelShow: 'always', // Panel selalu muncul
  sideBar: 'columns', // Tampilkan sidebar untuk drag pivot/value/row
  pagination: true,
  paginationPageSize: 10,
};


document.addEventListener('DOMContentLoaded', async () => {
  const gridDiv = document.querySelector('#myGrid');

  const res = await fetch('/api/barangs');
  const json = await res.json();

  if (json.success) {
    gridOptions.rowData = json.data;
    createGrid(gridDiv, gridOptions);
  } else {
    console.error('Gagal mengambil data:', json.message);
  }
});
