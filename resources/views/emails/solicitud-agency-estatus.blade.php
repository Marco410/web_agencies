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
                                    <h2> {{ $solicitud->user->name }} {{ $solicitud->user->apellido_p }} gracias por tu solicitud en AutoNavega®</h2>

                                    <h4>Tu solicitud ya fue revizada. Lamentablemente tuvimos que rechazarla.</h4>
                                    <p><strong>Mensaje del administrador:</strong></p>
                                    <p>{{ $solicitud->nota }}</p>
                                    <p>Muchas gracias por tu interés</p>
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