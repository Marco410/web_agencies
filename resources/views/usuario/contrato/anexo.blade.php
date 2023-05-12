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

        <style>
            @page {
                margin-top: 0;
            }
            .page-1-c{
                width: 900px;
                height: 960px;
                background-repeat: no-repeat;
                background-image: url({{public_path('assets/contrato/contrato1.png')}});
            }
            .page-2-c{
                width: 900px;
                height: 960px;
                background-repeat: no-repeat;
                background-image: url({{public_path('assets/contrato/contrato2.png')}});
            }
            .page-3-c{
                width: 900px;
                height: 960px;
                background-repeat: no-repeat;
                background-image: url({{public_path('assets/contrato/contrato3.png')}});
            }
            .page-4-c{
                width: 900px;
                height: 960px;
                background-repeat: no-repeat;
                background-image: url({{public_path('assets/contrato/contrato4.png')}});
            }
            .page-1{
                width: 900px;
                height: 960px;
                background-repeat: no-repeat;
                background-image: url({{public_path('assets/contrato/anexo1.png')}});
                
            }
            
            .page-2{
                width: 900px;
                height: 960px;
                background-repeat: no-repeat;
                background-image: url({{public_path('assets/contrato/anexo2.png')}});
                
            }

            .plan {
                position:fixed;
                right: 170px; 
                font-size: 15px;
                text-transform: capitalize;
                font-weight: bold;
                text-align: center;
            }
            .plan-date {
                position:fixed;
                right: 150px; 
                font-size: 15px;
                text-transform: capitalize;
                font-weight: bold;
                text-align: center;
            }

            .plan-page2 {
                position:fixed;
                right: 60px; 
                text-transform: capitalize;
                text-align: center;
            }

            .nombre {
                position:fixed;
                font-size: 10px;
                text-transform: capitalize;
                font-weight: bold;
                text-align: center;
                overflow: hidden;
                vertical-align: text-bottom;
            }

            .firma-2 {
                position:fixed;
                right: 80px; 
            }

            .firma {
                position:fixed;
                right: 200px; 
            }

            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
        <div class="page-1-c"></div>

        <div class="page-break"></div>

        <div class="page-2-c"></div>

        <div class="page-break"></div>

        <div class="page-3-c"></div>

        <div class="page-break"></div>

        <div class="page-4-c">
            <div style="top: 565px;height: 90px; width:300px; font-size: 11px; font-weight: bold; text-align: left;" class="firma-2" >
                <img style='display:block; width:100%;height:150px;' id='base64image' src='data:image/jpeg;base64,{{$contrato->user->firma}}' /> 
            </div>
            <p style="top: 677px; left: 422px; width: 180px; height: 30px;" class="nombre" >{{ $contrato->user->name }} {{ $contrato->user->apellido_p }} {{ $contrato->user->apellido_m }}</p>
            <p style="top: 717px; left: 422px; width: 180px; height: 30px;" class="nombre" >{{ $solicitud->razon_social }}</p>
        </div>

        <div class="page-break"></div>

        <div class="page-1">
            <p style=" bottom: 108px; " class="plan" >{{ $contrato->membresia->membresia }}</p>
            <p style=" bottom: 78px; " class="plan" >{{ $contrato->plan }}</p>
            <p style=" bottom: 48px; " class="plan-date" >{{ date('d/m/Y', strtotime($contrato->created_at)) }}</p>
        </div>
        
        <div class="page-break"></div>

        <div class="page-2">
            <p style="top: 295px;height: 50px; width:335px;font-size: 11px; font-weight: bold;" class="plan-page2" >{{ $solicitud->razon_social }}</p>

            <div style="top: 350px; height: 105px; width:330px; margin-left: 10px; text-align: left; font-size: 9px;" class="plan-page2" >
                <ul>
                    <li style="line-height: 10px">- No. Instrumento: <strong>{{$solicitud->no_instrumento }}</strong></li>
                    <li style="line-height: 10px">- Volumen: <strong>{{$solicitud->acta_volumen }}</strong></li>
                    <li style="line-height: 10px">- Fecha: <strong>{{$solicitud->acta_fecha }}</strong></li>
                    <li style="line-height: 10px">- Localidad: <strong>{{$solicitud->acta_localidad }}</strong></li>
                    <li style="line-height: 10px">- No. Notario: <strong>{{$solicitud->acta_numero }}</strong></li>
                    <li style="line-height: 10px">- Inscripción RPC: <strong>{{$solicitud->acta_datos }}</strong></li>
                </ul>
                
            </div>

            <p style="top: 455px;height: 45px;  width:335px;font-size: 11px; font-weight: bold;" class="plan-page2" >{{ $contrato->user->name }} {{ $contrato->user->apellido_p }} {{ $contrato->user->apellido_m }}</p>

            <div style="top: 500px; height: 105px; width:330px; margin-left: 10px; text-align: left; font-size: 9px;" class="plan-page2" >
                <ul>
                    <li style="line-height: 10px">- No. Instrumento: <strong>{{$solicitud->datos_no_instrumento }}</strong></li>
                    <li style="line-height: 10px">- Volumen: <strong>{{$solicitud->datos_volumen }}</strong></li>
                    <li style="line-height: 10px">- Fecha: <strong>{{$solicitud->datos_fecha }}</strong></li>
                    <li style="line-height: 10px">- Localidad: <strong>{{$solicitud->datos_localidad }}</strong></li>
                    <li style="line-height: 10px">- No. Notario: <strong>{{$solicitud->datos_notario }}</strong></li>
                    <li style="line-height: 10px">- Inscripción RPC: <strong>{{$solicitud->datos_datos }}</strong></li>
                </ul>
                
            </div>

            <div style="top: 598px;height: 20px; width:325px;font-size: 11px; font-weight: bold; text-align: left;" class="plan-page2" >{{ $solicitud->rfc_rfc }} </div>

            <div style="top: 633px;height: 50px;  width:325px;font-size: 11px; font-weight: bold; text-align: left; line-height: 10px; font-weight: bold;" class="plan-page2" >{{ $solicitud->rfc_domicilio }} </div>
            <div style="top: 678px;height: 20px;  width:325px;font-size: 11px; font-weight: bold; text-align: left;" class="plan-page2" >{{ $solicitud->rfc_telefono }} </div>

            <div style="top: 707px;height: 20px;  width:325px;font-size: 11px; font-weight: bold; text-align: left;" class="plan-page2" >{{ $solicitud->rfc_email }} </div>

            <div style="top: 840px;height: 90px; width:300px;font-size: 11px; font-weight: bold; text-align: left;" class="firma" >
                <img style='display:block; width:100%;height:150px;' id='base64image' src='data:image/jpeg;base64,{{$contrato->user->firma}}' /> 
            </div>

    </body>
</html>  