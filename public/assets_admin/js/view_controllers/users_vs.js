
$('#tabla-users').DataTable({
    responsive: true,
    columnDefs: [
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 6 },
        { responsivePriority: 3, targets: 3 },
        { responsivePriority: 4, targets: 4 },
    ],
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


moment.locale("es");
const options2 = { style: 'currency', currency: 'MXN' };
const numberFormat2 = new Intl.NumberFormat('es-MX', options2);
$.ajax({
    type: 'GET',
    url: '/usuario/perfil/membresia/check?agencia=' + $('#agencia_id').val(),
    headers: {
        'Content-Type': 'application/json'
    },
    success: function (data) {
        if (data == "false") {
            //no tiene membresia 
            $("#btn-update-membresia").hide();
            $("#btn-buy-membresia").show();
            $("#next_payment").hide();

        } else if (data == "cancel") {
            $("#membresia-change-status").show();

            setTimeout(function () {
                location.reload();
            }, 4000);

        } else {
            //tiene membresia
            var res = JSON.parse(data);
            $("#btns-update-membresia").show();
            $("#next_payment").show();

            $("#suscripcion_date").html(moment(res.results[0].auto_recurring.start_date).format('DD MMMM YYYY'));

            $("#next_payment_date").html(moment(res.results[0].next_payment_date).format('DD MMMM YYYY'));

            $("#transaction_amount").html(numberFormat2.format(res.results[0].auto_recurring.transaction_amount));

            $("#reason").html(res.results[0].reason);

            if (res.results[0].status == "authorized") {

                $("#status").html('<label class="badge badge-success" >Activo</label>');
            }
            if (res.results[0].summarized.pending_charge_quantity) {
                $("#months_plan_pending").html(res.results[0].summarized.pending_charge_quantity + " meses");
            } else {
                $("#months_plan_pending").html('0');
            }

            console.log(res);
        }
    }
});