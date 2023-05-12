

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
            var res = JSON.parse(data);

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
            var res = JSON.parse(data);

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