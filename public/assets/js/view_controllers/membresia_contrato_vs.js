

$(".btn-solicitud").on('click', function () {
    var data = {
        'type': $(this).data('type'),
        'id': $(this).data('id')
    };

    var type = $(this).data('type');
    var solicitud_id = $(this).data('id');

    $(".btn-solicitud").removeClass('selected');
    $(this).addClass('selected');

    $.ajax({
        type: 'GET',
        url: '/usuario/perfil/membresia/get-data-contrato',
        data: data,
        headers: {
            'Content-Type': 'application/json'
        },
        success: function (data) {
            $("#razon_social").html('<strong>' + data.razon_social + '</strong>');

            $("#no_instrumento").html('<strong>' + data.no_instrumento + '</strong>');
            $("#acta_volumen").html('<strong>' + data.acta_volumen + '</strong>');
            $("#acta_fecha").html('<strong>' + data.acta_fecha + '</strong>');
            $("#acta_localidad").html('<strong>' + data.acta_localidad + '</strong>');
            $("#acta_numero").html('<strong>' + data.acta_numero + '</strong>');
            $("#acta_datos").html('<strong>' + data.acta_datos + '</strong>');

            if (type == 'solicitud') {
                $("#nombre").html('<strong>' + data.nombre + " " + data.apellido_p + " " + data.apellido_m + '</strong>');

            } else if (type == 'solicitud-agencia') {
                $("#nombre").html('<strong>' + data.user.name + " " + data.user.apellido_p + " " + data.user.apellido_m + '</strong>');
            }

            $("#datos_no_instrumento").html('<strong>' + data.datos_no_instrumento + '</strong>');
            $("#datos_volumen").html('<strong>' + data.datos_volumen + '</strong>');
            $("#datos_fecha").html('<strong>' + data.datos_fecha + '</strong>');
            $("#datos_localidad").html('<strong>' + data.datos_localidad + '</strong>');
            $("#datos_notario").html('<strong>' + data.datos_notario + '</strong>');
            $("#datos_datos").html('<strong>' + data.datos_datos + '</strong>');
            $("#rfc").html('<strong>' + data.rfc_rfc + '</strong>');
            $("#domicilio").html('<strong>' + data.rfc_domicilio + '</strong>');
            $("#telefono").html('<strong>' + data.rfc_telefono + '</strong>');
            $("#correo").html('<strong>' + data.rfc_email + '</strong>');

            $("#type_solicitud").val(type);
            $("#solicitud_id").val(solicitud_id);



        }
    });
});



function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
    });
}

let signaturePad = null;

const canvas = document.getElementById("signature-canvas");
canvas.height = canvas.offsetHeight;
canvas.width = canvas.offsetWidth;

signaturePad = new SignaturePad(canvas, {});

signaturePad.addEventListener("endStroke", () => {
    const signatureImage = signaturePad.toDataURL();

    var data_uri = signaturePad.toDataURL();
    var encoded_image = data_uri.split(",")[1]
    $("#firma").val(encoded_image);
    console.log(signatureImage);
});

$("#btn-limpiar").on("click", function () {
    signaturePad.clear();
    $("#firma").val("");
});

