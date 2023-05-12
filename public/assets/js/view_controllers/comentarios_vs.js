
console.log("ASDSDA");
$('#tabla-comments').DataTable({
    responsive: true,
    /* columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 6 },
        { responsivePriority: 3, targets: 3 },
        { responsivePriority: 4, targets: 4 },
    ], */
    "bFilter": true,
    "searching": true,
    "order": [[0, "desc"]],
    dom: '<"row" <"col-sm-4" l> <"col-sm-4 offset-4" <"pull-right" f><"float-right" B> > >r<"mt-30" t><"row mt-30" <"col-sm-5" i> <"col-sm-7" p> >',
    buttons: [
        {
            extend: 'excel',
            className: 'btn btn-sm btn-success ',
            exportOptions: {
                columns: ':not(:last-child)',
            },
            init: function (api, node, config) {
                $(node).removeClass('dt-button');
            }
        },
    ]
});


$('#filter').on('change', function () {
    var s = "";
    if (window.location.search.toString().indexOf('?') != -1) {
        s = "&";
    } else {
        s = "?";
    }
    window.location.href = window.location + s + 'agencia=' + $(this).val();
});


