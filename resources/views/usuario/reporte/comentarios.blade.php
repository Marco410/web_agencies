<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      
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

        <title>Reporte Comentarios</title>

        <style>
            .container {
                max-width: 1200px;
            }
            .container {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }
            .col-lg-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
            .col-lg-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-sm-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
            .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto {
                position: relative;
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
            }
        </style>
    </head>
    <body style="margin: 5px;">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-4 text-center offset-4">
                        <img class="img-fluid" src="{{ public_path('assets/img/logo-negro.png') }}" alt="Logo AutoNavega Registro">
                    </div>
                    <div class="col-12 text-center">
                        <h2>Reporte de Comentarios</h2>
                    </div>
                    <div class="col-12 text-center">
                        <h3>{{$agencia->nombre}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 offset-6 ">
                                        <span>Usuario: <strong>{{ auth()->user()->name }} {{ auth()->user()->apellido_p }} {{ auth()->user()->apellido_m }}</strong></span> <br>
                                        <span>Fecha del Reporte: <strong>{{ date('d M Y h:i:s A') }}</strong></span>
                                      </div>
                                    <table class="table table-striped table-hover mt-4">
                                        <tbody>
                                          <tr>
                                            <th scope="row">No de Comentarios</th>
                                            <th>{{ $agencia->reviews_count }} <i class="fas fa-comment" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Comentarios de este día ({{ date('d') }})</th>
                                            <th>{{ $reviewsByDay }} <i class="fas fa-comment" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Comentarios de este mes ({{ date('M') }})</th>
                                            <th>{{ $reviewsByMonth }} <i class="fas fa-comment" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Comentarios de este año ({{ date('Y') }}) </th>
                                            <th>{{ $reviewsByYear }} <i class="fas fa-comment" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Respuestas a comentarios</th>
                                            <th>{{ $countAnswers }} <i class="fas fa-reply" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Rating según comentarios</th>
                                            <th>{{ $rating }} <i class="fas fa-star" ></i> </th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Atención del Personal según comentarios</th>
                                            <th>{{ $atencion }} <i class="fas fa-star" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Instalaciones según comentarios</th>
                                            <th>{{ $practicidad }} <i class="fas fa-star" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Tiempo de Respuesta según comentarios</th>
                                            <th>{{ $velocidad }} <i class="fas fa-star" ></i></th>
                                          </tr>
                                          <tr>
                                            <th scope="row">Calificación General según comentarios</th>
                                            <th>{{ $resultado }} <i class="fas fa-star" ></i></th>
                                          </tr>
                                          
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
					<div class="row">
						<div class="col-12 text-center">
							<div class="copyright-text">
								<p>Copyright &copy; 2021 - {{ date('Y') }} MORGUI, S.A.P.I. Todos los derechos reservados. La marca <a href="{{route('index')}}">AutoNavega</a>  es una marca registrada. El logotipo es una marca comercial registrada.</p> 
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </body>
</html>