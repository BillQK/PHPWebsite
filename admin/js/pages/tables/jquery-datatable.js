$(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        pageLength:5, 
        language: {
            paginate: {
                previous: " < ",
                next: " > "
            }
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});