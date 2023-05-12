<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.css">
        
        <link rel="stylesheet" type="text/css" href="{{ public_path('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ public_path('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ public_path('assets/plugins/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ public_path('assets/css/style.css')}}">
        
        <script src="{{public_path('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 text-center">
                                    <h2>Hola {{ $solicitud->nombre }} {{ $solicitud->apellido_p }}</h2>
                                    <h3>Gracias por realizar tu solicitud en AutoNavega®</h3>
                                    <h3><strong>Membresía: </strong> {{ $solicitud->membresia }}</h3>
                                    <p>Tu solicitud ya fue revizada. Y la aprobamos.</p>
                                    <p><strong>Datos de acceso:</strong> </p>
                                    <h2><strong>Usuario:</strong>{{ $user->email }}</h2>
                                    <h2><strong>Contraseña:</strong> {{ $user->pass }}</h2>
                                    <p>Muchas gracias por tu interés</p>
                            
                                    <h3>Resumen de tus datos de registro:</h3>
                                    <h4>Datos de Contacto:</h4> <br>
                                    <p><strong>Nombre: </strong> {{ $solicitud->nombre }} {{ $solicitud->apellido_p }} {{ $solicitud->apellido_m }}</p>
                                    <p><strong>Email: </strong> {{ $solicitud->email }}</p>
                                    <p><strong>Teléfono: </strong> {{ $solicitud->telefono }}</p>
                                    <p><strong>Empresa: </strong> {{ $solicitud->empresa }}</p>
                                    <p><strong>Empresa: </strong> {{ $solicitud->empresa }}</p>
                                    <p><strong>Puesto: </strong> {{ $solicitud->puesto }}</p>
                                    <h4>Datos de la Concesionaria</h4> <br>
                                    <p><strong>Razón Social: </strong> {{ $solicitud->razon_social }}</p>
                                    <p><strong>ACTA CONSTITUTIVA:</strong></p>
                                    <p><strong>Número de Instrumento: </strong> {{ $solicitud->no_instrumento }}</p>
                                    <p><strong>Volumen del acta: </strong> {{ $solicitud->acta_volumen }}</p>
                                    <p><strong>Fecha de celebración: </strong> {{ $solicitud->acta_fecha }}</p>
                                    <p><strong>Localidad: </strong> {{ $solicitud->acta_localidad }}</p>
                                    <p><strong>Número de Notario: </strong> {{ $solicitud->acta_numero }}</p>
                                    <p><strong>Datos de inscripción ante el R.P.C.: </strong> {{ $solicitud->acta_datos }}</p>
                                    <p><strong>R.F.C.:</strong></p>
                                    <p><strong>Número de Instrumento: </strong> {{ $solicitud->rfc_numero }}</p>
                                    <p><strong>Volumen: </strong> {{ $solicitud->rfc_volumen }}</p>
                                    <p><strong>Fecha de Celebración: </strong> {{ $solicitud->rfc_fecha }}</p>
                                    <p><strong>Domicilio: </strong> {{ $solicitud->rfc_domicilio }}</p>
                                    <p><strong>Teléfono: </strong> {{ $solicitud->rfc_telefono }}</p>
                                    <p><strong>Email RFC: </strong> {{ $solicitud->rfc_email }}</p>
                                    <h4>Documentación recibida:</h4> <br>
                                    <p><strong>INE: </strong> <img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega"></p>
                                    <p><strong>Acta constitutiva de la empresa: </strong> <img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega"></p>
                                    <p><strong>Identificación del apoderado legal: </strong> <img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega"></p>
                                    <p><strong>Poder Notarial: </strong> <img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega"></p>
                                    <p><strong>Hoja de Registro del R.F.C.: </strong> <img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega"></p>
                                    <p><strong>Comprobante de domicilio: </strong> <img class="img-fluid desk" width="25px" src="{{ asset('assets/landing/check.png') }}" alt="check Autonavega"></p>
                                    <p>Nuevamente gracias por registrarte.
                                        Estaremos en contacto muy pronto para indicarte los siguientes pasos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <img class="img-fluid" width="50%" src="{{ asset('assets/img/logo-negro.png') }}" alt="Logo AutoNavega">
                    </div>
                    <div class="col-sm-12 text-center">
                        <small class="text-secondary" >Atentamente, <a href="https://autonavega.com/">autonavega.com</a></small>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>