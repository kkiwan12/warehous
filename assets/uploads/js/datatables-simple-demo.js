window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('example');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple,{
            "dom": '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
            buttons: [
                    {
                        extend: 'excelHtml5',
                    },
                    {
                        extend: 'print',
                        exportOptions: {stripHtml: false },
                    }]
        });
    }

 
});
