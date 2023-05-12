
$('#filter').on('change', function () {
    var s = "";
    if (window.location.search.toString().indexOf('?') != -1) {
        s = "&";

    } else {
        s = "?";
    }
    window.location.href = window.location + s + 'order=' + $(this).val();
});

var contador;
function calificar(item) {
    contador = item.id[0];
    let nombre = item.id.substring(1);
    for (i = 0; i < 5; i++) {
        if (i < contador) {
            document.getElementById((i + 1) + nombre).style.color = "orange";
        } else {
            document.getElementById((i + 1) + nombre).style.color = "#dedfe0";
        }
    }
    if (nombre == "ate" || nombre == 'ate_movil') {
        $('#atencion').val(contador);
        $('#atencion_movil').val(contador);
    } else if (nombre == "prac" || nombre == 'prac_movil') {
        $('#practicidad').val(contador);
        $('#practicidad_movil').val(contador);
    } else if (nombre == "vel" || nombre == 'vel_movil') {
        $('#velocidad').val(contador);
        $('#velocidad_movil').val(contador);
    } else if (nombre == "res" || nombre == 'res_movil') {
        $('#resultado').val(contador);
        $('#resultado_movil').val(contador);
    }

    if (nombre == 'ate_personal') {
        $('#atencion_personal').val(contador);
    } else if (nombre == 'tiempo_per') {
        $('#tiempo_personal').val(contador);
    } else if (nombre == 'cono_per') {
        $('#conocimiento_personal').val(contador);

    }
}


$('#save-review').on("click", function () {
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
    var atencion = $("#atencion").val();
    var practicidad = $("#practicidad").val();
    var velocidad = $("#velocidad").val();
    var resultado = $("#resultado").val();
    var comentario = $("#comentario").val();

    if (comentario == "") {
        notyf.open({
            type: 'error',
            message: 'Escribe en la caja de comentario'
        });
    } else {
        var fd = new FormData();
        csrftoken = getCookie('csrftoken');
        fd.append("csrfmiddlewaretoken", csrftoken);
        fd.append("agencia_id", $("#agencia_id").val());
        fd.append("atencion", atencion);
        fd.append("practicidad", practicidad);
        fd.append("velocidad", velocidad);
        fd.append("resultado", resultado);
        fd.append("comentario", comentario);
        if (filtro(comentario)) {
            notyf.open({
                type: 'error',
                message: 'No se permiten comentarios con groserias.'
            });
        } else {

            const response = axios.post('/usuario/store-review', fd, {
            }).then(res => {

                notyf.open({
                    type: 'success',
                    message: 'Tu comentario se guardo con éxito. ¡Gracias!'
                });

                $("#atencion").val(0);
                $("#practicidad").val(0);
                $("#velocidad").val(0);
                $("#resultado").val(0);
                $("#comentario").val("");

                document.getElementById("1ate").style.color = "#dedfe0";
                document.getElementById("2ate").style.color = "#dedfe0";
                document.getElementById("3ate").style.color = "#dedfe0";
                document.getElementById("4ate").style.color = "#dedfe0";
                document.getElementById("5ate").style.color = "#dedfe0";

                document.getElementById("1prac").style.color = "#dedfe0";
                document.getElementById("2prac").style.color = "#dedfe0";
                document.getElementById("3prac").style.color = "#dedfe0";
                document.getElementById("4prac").style.color = "#dedfe0";
                document.getElementById("5prac").style.color = "#dedfe0";

                document.getElementById("1vel").style.color = "#dedfe0";
                document.getElementById("2vel").style.color = "#dedfe0";
                document.getElementById("3vel").style.color = "#dedfe0";
                document.getElementById("4vel").style.color = "#dedfe0";
                document.getElementById("5vel").style.color = "#dedfe0";

                document.getElementById("1res").style.color = "#dedfe0";
                document.getElementById("2res").style.color = "#dedfe0";
                document.getElementById("3res").style.color = "#dedfe0";
                document.getElementById("4res").style.color = "#dedfe0";
                document.getElementById("5res").style.color = "#dedfe0";



                setTimeout(function () {
                    location.reload();
                }, 1800);
            }).catch((err) => {
                notyf.error('Ocurrio un error, intentalo de nuevo');

            });
        }

    }

});

$('#save-review-movil').on("click", function () {
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
    var atencion = $("#atencion_movil").val();
    var practicidad = $("#practicidad_movil").val();
    var velocidad = $("#velocidad_movil").val();
    var resultado = $("#resultado_movil").val();
    var comentario = $("#comentario_movil").val();

    if (comentario == "") {
        notyf.open({
            type: 'error',
            message: 'Escribe en la caja de comentario'
        });
    } else {
        var fd = new FormData();
        csrftoken = getCookie('csrftoken');
        fd.append("csrfmiddlewaretoken", csrftoken);
        fd.append("agencia_id", $("#agencia_id_movil").val());
        fd.append("atencion", atencion);
        fd.append("practicidad", practicidad);
        fd.append("velocidad", velocidad);
        fd.append("resultado", resultado);
        fd.append("comentario", comentario);
        if (filtro(comentario)) {
            notyf.open({
                type: 'error',
                message: 'No se permiten comentarios con groserias.'
            });
        } else {

            const response = axios.post('/usuario/store-review', fd, {
            }).then(res => {

                notyf.open({
                    type: 'success',
                    message: 'Tu comentario se guardo con éxito. ¡Gracias!'
                });

                $("#atencion_movil").val(0);
                $("#practicidad_movil").val(0);
                $("#velocidad_movil").val(0);
                $("#resultado_movil").val(0);
                $("#comentario_movil").val("");

                document.getElementById("1ate_movil").style.color = "#dedfe0";
                document.getElementById("2ate_movil").style.color = "#dedfe0";
                document.getElementById("3ate_movil").style.color = "#dedfe0";
                document.getElementById("4ate_movil").style.color = "#dedfe0";
                document.getElementById("5ate_movil").style.color = "#dedfe0";

                document.getElementById("1prac_movil").style.color = "#dedfe0";
                document.getElementById("2prac_movil").style.color = "#dedfe0";
                document.getElementById("3prac_movil").style.color = "#dedfe0";
                document.getElementById("4prac_movil").style.color = "#dedfe0";
                document.getElementById("5prac_movil").style.color = "#dedfe0";

                document.getElementById("1vel_movil").style.color = "#dedfe0";
                document.getElementById("2vel_movil").style.color = "#dedfe0";
                document.getElementById("3vel_movil").style.color = "#dedfe0";
                document.getElementById("4vel_movil").style.color = "#dedfe0";
                document.getElementById("5vel_movil").style.color = "#dedfe0";

                document.getElementById("1res_movil").style.color = "#dedfe0";
                document.getElementById("2res_movil").style.color = "#dedfe0";
                document.getElementById("3res_movil").style.color = "#dedfe0";
                document.getElementById("4res_movil").style.color = "#dedfe0";
                document.getElementById("5res_movil").style.color = "#dedfe0";



                setTimeout(function () {
                    location.reload();
                }, 1800);
            }).catch((err) => {
                notyf.error('Ocurrio un error, intentalo de nuevo');

            });
        }

    }

});

$('#save-review-personal').on("click", function () {
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
    var atencion = $("#atencion_personal").val();
    var tiempo = $("#tiempo_personal").val();
    var conocimiento = $("#conocimiento_personal").val();
    var comentario = $("#comentario_personal").val();

    if (comentario == "") {
        notyf.open({
            type: 'error',
            message: 'Escribe en la caja de comentario'
        });
    } else {
        var fd = new FormData();
        csrftoken = getCookie('csrftoken');
        fd.append("csrfmiddlewaretoken", csrftoken);
        fd.append("personal_id", $("#personal_id").val());
        fd.append("atencion", atencion);
        fd.append("tiempo", tiempo);
        fd.append("conocimiento", conocimiento);
        fd.append("comentario", comentario);
        if (filtro(comentario)) {
            notyf.open({
                type: 'error',
                message: 'No se permiten comentarios con groserias.'
            });
        } else {

            const response = axios.post('/usuario/store-review-personal', fd, {
            }).then(res => {

                notyf.open({
                    type: 'success',
                    message: 'Tu comentario se guardo con éxito. ¡Gracias!'
                });

                $("#atencion").val(0);
                $("#tiempo").val(0);
                $("#conocimiento").val(0);
                $("#comentario").val("");

                document.getElementById("1ate_personal").style.color = "#dedfe0";
                document.getElementById("2ate_personal").style.color = "#dedfe0";
                document.getElementById("3ate_personal").style.color = "#dedfe0";
                document.getElementById("4ate_personal").style.color = "#dedfe0";
                document.getElementById("5ate_personal").style.color = "#dedfe0";

                document.getElementById("1tiempo_per").style.color = "#dedfe0";
                document.getElementById("2tiempo_per").style.color = "#dedfe0";
                document.getElementById("3tiempo_per").style.color = "#dedfe0";
                document.getElementById("4tiempo_per").style.color = "#dedfe0";
                document.getElementById("5tiempo_per").style.color = "#dedfe0";

                document.getElementById("1cono_per").style.color = "#dedfe0";
                document.getElementById("2cono_per").style.color = "#dedfe0";
                document.getElementById("3cono_per").style.color = "#dedfe0";
                document.getElementById("4cono_per").style.color = "#dedfe0";
                document.getElementById("5cono_per").style.color = "#dedfe0";

                $('#calificarPersonal').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1800);
            }).catch((err) => {
                notyf.error('Ocurrio un error, intentalo de nuevo');

            });
        }

    }

});

var grocerias = [];
$.ajax({
    url: '/admin/groserias/get',
    method: 'GET',

}).done(function (resp) {
    grocerias = resp;
});

function filtro(comentario) {
    var arrayTexto = comentario.split(" ");
    var isbad = false;

    var words = arrayTexto.filter(function (word) {
        isbad = grocerias.includes(word);
    });

    return isbad;
}


function getCookie(name) {
    let cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}


$('#calificarPersonal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var recipient = button.data('nombre');
    var personal_id = button.data('personalid');
    var puesto = button.data('puesto');

    $('#nombre_personal').html(recipient);
    $('#personal_id').val(personal_id);
    $('#personal_puesto').html(puesto);
})


