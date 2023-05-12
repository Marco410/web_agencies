

if ($('#estados')[0]) {

    let estado_id = $('#estados').val();
    getMunicipios(estado_id);
}

$('#estados').on('change', function () {
    estado_id = document.getElementById("estados").value;
    getMunicipios(estado_id);
});


function getMunicipios(estado) {
    $.ajax({
        url: "./edit/show-municipios",
        type: 'GET',
        data: {
            estado: estado,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            showMunicipios(response);

        },
        statusCode: {
            404: function () {
                alert('web not found');
            }
        },

    });
}


const municipio = $('#ciudades');

function showMunicipios(municipios) {

    let arrayMunicipios = JSON.parse(municipios);

    $('#ciudades option').remove();

    arrayMunicipios.map(item => {
        municipio.append(`<option value =${item.id}>${item.municipio}</option>`);
    })

}

$('#eliminarAgenciaModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var agencia_id = button.data('agencia');
    var user_id = button.data('user');
    $("#agencia_delete_id").val(agencia_id);
    $("#user_delete_id").val(user_id);
});

$('#bajaPlanModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var user_id = button.data('user');
    $("#user_plan_id").val(user_id);
});