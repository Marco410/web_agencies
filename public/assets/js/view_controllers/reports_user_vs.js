
$('#enlace-comentarios').hide();
$('#enlace-agencias').hide();
$('#enlace-mes').hide();
$('#enlace-empleados').hide();
$('#enlace-reporte-mensual').hide();
$('#msj-enlace').show();
$('#msj-enlace-agencia').show();
$('#msj-enlace-mes').show();
$('#msj-enlace-empleados').show();
$('#msj-enlace-reporte-mensual').show();

$('#agencias').on('change', function () {

    $('#enlace-comentarios').show();
    $('#enlace-agencias').show();
    $('#enlace-mes').show();
    $('#enlace-empleados').show();
    $('#enlace-reporte-mensual').show();
    $('#msj-enlace').hide();
    $('#msj-enlace-agencia').hide();
    $('#msj-enlace-mes').hide();
    $('#msj-enlace-empleados').hide();
    $('#msj-enlace-reporte-mensual').hide();

    $("#enlace-comentarios").attr('href', 'reporte-comentarios/' + $(this).val());
    $("#enlace-agencias").attr('href', 'reporte-agencia/' + $(this).val());
    $("#enlace-mes").attr('href', 'reporte-mes/' + $(this).val());
    $("#enlace-empleados").attr('href', 'reporte-empleados/' + $(this).val());
    $("#enlace-reporte-mensual").attr('href', 'reporte-mensual/' + $(this).val());
});