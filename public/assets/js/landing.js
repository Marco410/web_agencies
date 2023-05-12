$('.collapse.show').each(function () {
	$(this).prev(".card-header").find(".fas").addClass("fa-minus").removeClass("fa-plus");

	$(".collapse").on("show.bs.collapse", function () {
		$(this).prev(".card-header").find(".fas").addClass("fa-minus").removeClass("fa-plus");
	}).on("hide.bs.collapse", function () {
		$(this).prev(".card-header").find(".fas").addClass("fa-plus").removeClass("fa-minus");
	});
});

$(".link-to").on("click", function (e) {
	// 1
	e.preventDefault();
	// 2
	const href = $(this).attr("href");
	// 3
	$("html, body").animate({ scrollTop: $(href).offset().top - 100 }, 800);
});

var inputs = document.querySelectorAll('.inputIne');
Array.prototype.forEach.call(inputs, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#ine_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

var inputActa = document.querySelectorAll('.inputActa');
Array.prototype.forEach.call(inputActa, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#acta_constitutiva_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

var inputsIden = document.querySelectorAll('.inputIden');
Array.prototype.forEach.call(inputsIden, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#identificacion_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

var inputsPoder = document.querySelectorAll('.inputPoder');
Array.prototype.forEach.call(inputsPoder, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#poder_notarial_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

var inputsHoja = document.querySelectorAll('.inputHoja');
Array.prototype.forEach.call(inputsHoja, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#hoja_registro_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

var inputsComp = document.querySelectorAll('.inputComp');
Array.prototype.forEach.call(inputsComp, function (input) {
	var label = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener('change', function (e) {
		var fileName = '';
		if (this.files && this.files.length > 1) {

		}
		else {
			fileName = e.target.value.split("\\").pop();
		}
		if (fileName) {
			$("#comprobante_filename").html(fileName + '<i class="fas fa-file-check float-right"></i>');
		} else {
			label.innerHTML = labelVal;
		}
	});
});

$('#save-solicitud').on("click", function () {


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
	var nombre = $("#nombre").val();
	var apellido_p = $("#apellido_p").val();
	var apellido_m = $("#apellido_m").val();
	var email = $("#email").val();
	var telefono = $("#telefono").val();
	var membresia = $("#membresia").val();
	var empresa = $("#empresa").val();
	var puesto = $("#puesto").val();
	var razon_social = $("#razon_social").val();
	var no_instrumento = $("#no_instrumento").val();
	var acta_volumen = $("#acta_volumen").val();
	var acta_fecha = $("#acta_fecha").val();
	var acta_localidad = $("#acta_localidad").val();
	var acta_numero = $("#acta_numero").val();
	var acta_datos = $("#acta_datos").val();

	var datos_no_instrumento = $("#datos_no_instrumento").val();
	var datos_volumen = $("#datos_volumen").val();
	var datos_fecha = $("#datos_fecha").val();
	var datos_localidad = $("#datos_localidad").val();
	var datos_notario = $("#datos_notario").val();
	var datos_datos = $("#datos_datos").val();

	var rfc_rfc = $("#rfc_rfc").val();
	var rfc_numero = $("#rfc_numero").val();
	var rfc_volumen = $("#rfc_volumen").val();
	var rfc_fecha = $("#rfc_fecha").val();
	var rfc_localidad = $("#rfc_localidad").val();
	var rfc_telefono = $("#rfc_telefono").val();
	var rfc_email = $("#rfc_email").val();

	var ine = document.querySelector('#ine');
	var acta_constitutiva = document.querySelector('#acta_constitutiva');
	var poder_notarial = document.querySelector('#poder_notarial');
	var hoja_registro = document.querySelector('#hoja_registro');
	var comprobante = document.querySelector('#comprobante');


	if ($('#customCheck1').prop('checked')) {
		var fd = new FormData();
		csrftoken = getCookie('csrftoken');
		fd.append("csrfmiddlewaretoken", csrftoken);
		fd.append("nombre", nombre);
		fd.append("apellido_p", apellido_p);
		fd.append("apellido_m", apellido_m);
		fd.append("email", email);
		fd.append("telefono", telefono);
		fd.append("membresia", membresia);
		fd.append("empresa", empresa);
		fd.append("puesto", puesto);
		fd.append("razon_social", razon_social);
		fd.append("no_instrumento", no_instrumento);
		fd.append("acta_volumen", acta_volumen);
		fd.append("acta_fecha", acta_fecha);
		fd.append("acta_localidad", acta_localidad);
		fd.append("acta_numero", acta_numero);
		fd.append("acta_datos", acta_datos);

		fd.append("datos_no_instrumento", datos_no_instrumento);
		fd.append("datos_volumen", datos_volumen);
		fd.append("datos_fecha", datos_fecha);
		fd.append("datos_localidad", datos_localidad);
		fd.append("datos_notario", datos_notario);
		fd.append("datos_datos", datos_datos);

		fd.append("rfc_rfc", rfc_rfc);
		fd.append("rfc_numero", rfc_numero);
		fd.append("rfc_volumen", rfc_volumen);
		fd.append("rfc_fecha", rfc_fecha);
		fd.append("rfc_localidad", rfc_localidad);
		fd.append("rfc_telefono", rfc_telefono);
		fd.append("rfc_email", rfc_email);
		fd.append("ine", ine.files[0]);
		fd.append("acta_constitutiva", acta_constitutiva.files[0]);
		fd.append("identificacion", identificacion.files[0]);
		fd.append("poder_notarial", poder_notarial.files[0]);
		fd.append("hoja_registro", hoja_registro.files[0]);
		fd.append("comprobante", comprobante.files[0]);

		$("#loading_landing").show();
		const response = axios.post('/landing/registro-dealer', fd, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		}).then(res => {

			$("#loading_landing").hide();

			$("#form_register_modal").modal('hide');
			$('#success_modal').modal('toggle');

			$("#succes-msj").html("Tu solicitud se a creado con éxito. Te estaremos avisando el estatus con el correo que registraste. <br> <strong>" + res.data.email + "</strong> <br> ¡Gracias!");

		}).catch((error) => {
			try {
				$("#errors").html("");
				var errors = error.response.data.errors;
				if (errors) {
					notyf.error('Ocurrio un error, observa los errores que aparecen e intentalo de nuevo');
					Object.keys(errors).forEach(function (key) {
						$("#errors").append(' <div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>' + errors[key] + '</div>');
					});

					var element = document.querySelector("#errors");

					element.scrollIntoView();
				}
			} catch (error) {

			}


		});

	} else {
		notyf.open({
			type: 'warning',
			message: 'Debes de confirmar la información.'
		});
	}


});


function validarEmail(valor) {
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
				dismissible: true,
				duration: 3500,
			}
		]
	});
	if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)) {
		return true;
	} else {
		notyf.open({
			type: 'warning',
			message: 'El correo electrónico no es válido'
		});
		return false;
	}
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