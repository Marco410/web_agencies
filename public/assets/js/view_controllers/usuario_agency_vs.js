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

//obtener las membresias pausadas
/* $.ajax({
    type: 'GET',
    url: 'perfil/membresia/get_paused',
    headers: {
        'Content-Type': 'application/json'
    },
    success: function (data) {
        console.log(data);
        var res = JSON.parse(data);
        console.log(res.results);
        if (res.results.length == 1) {

        }
    }
}); */

$("#btn-cancelar-plan").on('click', function () {
    $("#cancelarPlanModal").modal('show');
});

$("#btn-cancelar-plan-check").on('click', function () {
    var notyf = new Notyf({
        duration: 2000,
        position: {
            x: 'right',
            y: 'top',
        },
        types: [
            {
                type: 'warning',
                background: 'orange',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'warning'
                }
            },
            {
                type: 'error',
                duration: 3000,
                dismissible: true
            },
            {
                type: 'success',
                duration: 2000,
                dismissible: true
            }
        ]
    });

    $.ajax({
        type: 'GET',
        url: 'perfil/membresia/cancelar',
        headers: {
            'Content-Type': 'application/json'
        },
        success: function (data) {
            console.log(data);
            var res = JSON.parse(data);
            console.log(res);

            $("#cancelarPlanModal").modal('hide');


            notyf.open({
                type: 'success',
                message: 'Plan cancelado con éxito'
            });

            setTimeout(function () {
                location.reload();
            }, 3000);

        }
    });
});

$("#btn-pause-plan").on('click', function () {
    $("#pausePlanModal").modal('show');
});

$("#btn-pause-plan-check").on('click', function () {
    var notyf = new Notyf({
        duration: 2000,
        position: {
            x: 'right',
            y: 'top',
        },
        types: [
            {
                type: 'warning',
                background: 'orange',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'warning'
                }
            },
            {
                type: 'error',
                duration: 3000,
                dismissible: true
            },
            {
                type: 'success',
                duration: 3000,
                dismissible: true
            }
        ]
    });

    $.ajax({
        type: 'GET',
        url: 'perfil/membresia/pausar',
        headers: {
            'Content-Type': 'application/json'
        },
        success: function (data) {
            console.log(data);
            var res = JSON.parse(data);
            console.log(res);

            $("#pausePlanModal").modal('hide');


            notyf.open({
                type: 'success',
                message: 'Plan pausado con éxito'
            });

            setTimeout(function () {
                location.reload();
            }, 3000);


        }
    });
});