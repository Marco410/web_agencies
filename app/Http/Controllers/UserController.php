<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Reviews;
use App\Agencias;
use App\AgencyQr;
use App\AgencyHorario;
use Carbon\Carbon;  
use App\UserAgency;
use App\ClaimAgency;
use App\ReviewsAnswers;
use App\Cita;
use App\Marcas;
use App\Personal;
use App\PersonalReviews;
use App\Solicitud;
use App\SolicitudAgency;
use App\Membresias;
use App\Suscripcion;
use App\Settings;
use App\Fotos;
use App\Contrato;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

use App\Notifications\NewReview;
use App\Notifications\SolicitudAgencyNoti;

use Illuminate\Support\Facades\Mail;
use App\Mail\CitaAccept;
use App\Mail\CitaDecline;
use App\Mail\SolicitudRegisterAgency;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Http;

use App\Http\Services\MPService;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:Dealer']);
    }

    public function dashboard(){
        $personalCount = 0;
        $comentarios = 0;
        $agencias = UserAgency::where('user_id',auth()->user()->id)->with('agencia')->orderBy('created_at','DESC')->get();
        foreach($agencias as $agencia){
            $person = Personal::where('agencia_id',$agencia->agencia_id)->get();
            foreach ($person as $p){
                $personalCount += 1;
            }
            $reviews = Reviews::where('agencia_id',$agencia->agencia_id)->get();
            foreach($reviews as $rev){
                $comentarios += 1;
            }
        }
        return view('usuario.user-dashboard',compact('personalCount','comentarios'));
    }

    public function cambiar_plan($agencia_id){
        $suscripcion = Suscripcion::where('agencia_id',$agencia_id)->where('user_id',auth()->user()->id)->where('active',1)->with(['contrato'])->first();
        $agencia = Agencias::where('id',$agencia_id)->first();
        return view('usuario.user-cambiar-plan',compact('agencia','suscripcion'));
    }

    public function activar_membresia($agencia_id){
        
        $agencia = Agencias::where('id',$agencia_id)->first();
        return view('usuario.user-membresia-select-activar',compact('agencia'));
    }

    public function perfil(){
        $personalCount = 0;
        $comentarios = 0;
        $agencias = UserAgency::where('user_id',auth()->user()->id)->with('agencia')->orderBy('created_at','DESC')->get();
        foreach($agencias as $agencia){
            $person = Personal::where('agencia_id',$agencia->agencia_id)->get();
            foreach ($person as $p){
                $personalCount += 1;
            }
            $reviews = Reviews::where('agencia_id',$agencia->agencia_id)->get();
            foreach($reviews as $rev){
                $comentarios += 1;
            }
        }

        return view('usuario.user-perfil',compact('personalCount','comentarios'));
    }

    public function perfil_update_nombre(Request $request){

        request()->validate([
            'name' => ['required'],
            'paterno' => ['required'],
            'materno' => ['required'],
        ],[
            'name.required' => 'Ingresa tu nombre',
            'paterno.required' => 'Ingresa tu apellido paterno',
            'materno.required' => 'Ingresa tu apellido materno'
        ]);

        $foto = User::where('id',auth()->user()->id)->update([
            'name' => $request->name,
            'apellido_p' => $request->paterno,
            'apellido_m' => $request->materno
        ]);
        return redirect()->back()->with('status_perfil','Tu nombre se actualizo correctamente.');
    }

    public function perfil_update_email(Request $request){

        request()->validate([
            'email' => ['required','email','unique:users,email'],
        ],[
            'email.unique' => 'Este correo ya se encuentra registrado',
            'email.required' => 'Ingresa un correo'
        ]);

        $foto = User::where('id',auth()->user()->id)->update([
            'email' => $request->email
        ]);
        return redirect()->back()->with('status_perfil','Tu email se actualizo correctamente.');
    }

    public function perfil_update_telefono(Request $request){

        request()->validate([
            'telefono' => ['required'],
        ],[
            'telefono.required' => 'Ingresa un teléfono'
        ]);

        $foto = User::where('id',auth()->user()->id)->update([
            'telefono' => $request->telefono
        ]);
        return redirect()->back()->with('status_perfil','Tu teléfono se actualizo correctamente.');
    }

    public function perfil_membresia(Request $request){
        $membresia = 1;
        if($request->membresia != null){
            if($request->membresia == "Basic"){
                $membresia = 2;
            }else if ($request->membresia == "Plus"){
                $membresia = 3;
            }
        }else{
            $membresia = 1;
        }
        $membresia = Membresias::where('id',$membresia)->first();
        $agencia = Agencias::where('id',$request->agencia)->first();
        return view('usuario.user-membresia',compact('membresia','agencia'));
    }

    public function perfil_membresia_cambiar(Request $request){
        $membresia = 1;
        if($request->membresia != null){
            if($request->membresia == "Basic"){
                $membresia = 2;
            }else if ($request->membresia == "Plus"){
                $membresia = 3;
            }
        }else{
            $membresia = 1;
        }
        $membresia = Membresias::where('id',$membresia)->first();
        $agencia = Agencias::where('id',$request->agencia)->first();

        $suscripcion = Suscripcion::where('agencia_id',$request->agencia)->where('user_id',auth()->user()->id)->where('active',1)->with(['contrato'])->first();

        return view('usuario.user-membresia-cambiar',compact('membresia','agencia','suscripcion'));
    }

    public function perfil_membresia_activar(Request $request){
        $membresia = 1;
        if($request->membresia != null){
            if($request->membresia == "Basic"){
                $membresia = 2;
            }else if ($request->membresia == "Plus"){
                $membresia = 3;
            }
        }else{
            $membresia = 1;
        }
        $membresia = Membresias::where('id',$membresia)->first();
        $agencia = Agencias::where('id',$request->agencia)->first();

        return view('usuario.user-membresia-activar',compact('membresia','agencia'));
    }

    public function perfil_membresia_contrato(Request $request){
        $method = $request->method();
        $suscripcion = null;

        if($request->suscripcion_id){
            $suscripcion = Suscripcion::where('id',$request->suscripcion_id)->with('contrato')->first();
        }

        $plan = $request->plan;
        $membresia = Membresias::where('id',$request->membresia)->first();
        $agencia = Agencias::where('id',$request->agencia)->first();
        $contrato = Contrato::where('user_id',auth()->user()->id)->where('status','Pendiente')->first();

        return view('usuario.user-membresia-contrato',compact('membresia','plan','agencia','contrato','suscripcion'));
    }

    public function get_data_contrato(Request $request){
        if($request->type == "solicitud"){
            $solicitud = Solicitud::where('id',$request->id)->first();
        }else{
            $solicitud = SolicitudAgency::where('id',$request->id)->with('user')->first();
        }

        return $solicitud;
    }

    public function firmar_contrato(Request $request){
        $user_id = auth()->user()->id;
        request()->validate([
            'firma' => 'required',
            'solicitud_id' => 'required',
            'check_confirmo' => 'required',
            
        ],[
            'firma.required' => 'Debes agregar tu firma',
            'solicitud_id.required' => 'Debes seleccionar una solicitud.',
            'check_confirmo.required' => 'Debes aceptar que los datos son verdaderos y leer el contrato.',
        ]);

        if(auth()->user()->firma == null){
            $user = User::where('id',auth()->user()->id)->update([
                'firma' => $request->firma
            ]);
        }

        $contrato = Contrato::where('user_id',$user_id)->where('agencia_id',$request->agencia_id)->where('solicitud_id',$request->solicitud_id)->first();

        if($contrato == null){
            $contrato = Contrato::create([
                'user_id' => $user_id,
                'agencia_id' => $request->agencia_id,
                'solicitud_id' => $request->solicitud_id,
                'type_solicitud' => $request->type_solicitud,
                'membresia_id' => $request->membresia_id,
                'plan' => $request->plan,
                'status' => 'Pendiente'
            ]);
        }else{
            $contratoU = Contrato::where('user_id',$user_id)->where('agencia_id',$request->agencia_id)->where('solicitud_id',$request->solicitud_id)->update([
                'status' => 'Cancelado'
            ]);

            $contrato = Contrato::create([
                'user_id' => $user_id,
                'agencia_id' => $request->agencia_id,
                'solicitud_id' => $request->solicitud_id,
                'type_solicitud' => $request->type_solicitud,
                'membresia_id' => $request->membresia_id,
                'plan' => $request->plan,
                'status' => 'Pendiente'
            ]);
        }

        if($request->type_solicitud == 'solicitud-agencia'){
            $soli = SolicitudAgency::where('id',$request->solicitud_id)->update([
                'in_contract' => 1
            ]);
        }else{
            $soli = Solicitud::where('id',$request->solicitud_id)->update([
                'in_contract' => 1
            ]);
        }

        return redirect()->route('user.perfil.membresia.check',  'contrato_id='.$contrato->id);
    }

    public function contrato_cancelar(Request $request){
        $user_id = auth()->user()->id;

        $contrato = Contrato::where('id',$request->contrato)->where('user_id',$user_id)->where('agencia_id',$request->agencia)->update([
            'status' => 'Cancelado'
        ]);

        return redirect()->route('user.agency.stats', $request->agencia)->with('status_hor','El contrato se cancelo con éxito');
    }

    public function perfil_membresia_checkout(Request $request){
        $user_id = auth()->user()->id;

        $contrato = Contrato::where('id',$request->contrato_id)->where('user_id',$user_id)->where('status','Pendiente')->first();

        if ($contrato != null){
            $plan = $contrato->plan;
            $membresia = Membresias::where('id',$contrato->membresia_id)->first();
            $agencia = Agencias::where('id',$contrato->agencia_id)->first();
            return view('usuario.user-membresia-check',compact('membresia','plan','agencia','contrato'));

        }else{
            return redirect()->back();
        }
    }

    public function firma_delete(){
        $user = User::where('id',auth()->user()->id)->update([
            'firma' => null
        ]);
        return redirect()->back();
    }

    public function perfil_membresia_check(Request $request){        
        $user_id = auth()->user()->id;
        $mpService = new MPService();

        $agencia = Agencias::where('id',$request->agencia)->with('suscripcion')->first();

        if($agencia->membresia_id == 1){
            $response = "false";
        }else{
            $response = $mpService->get_suscriptions($agencia->suscripcion->preapproval_id);

            if(count($response['results']) == 0 ){

                $user = Agencias::where('id',$agencia->id)->update([
                    'membresia_id' => 1
                ]);

                $suscripcion = Suscripcion::where('user_id',$user_id)->where('agencia_id',$agencia->id)->update([
                    'active' => 0
                ]);
                $response = "cancel";
            }else{
                $suscripcion = Suscripcion::where('user_id',$user_id)->where('preapproval_id',$agencia->suscripcion->preapproval_id)->where('agencia_id',$agencia->id)->update([
                    'application_id' => $response['results'][0]['application_id']
                ]);
            }
        }
        return $response;
    }

    public function perfil_update_membresia(Request $request){
        $user_id = auth()->user()->id;
        
        $contrato = Contrato::where('user_id',$user_id)->where('status','Pendiente')->first();

        $countSuscripcion = Suscripcion::where('user_id',$user_id)->where('agencia_id',$contrato->agencia_id)->where('active',1)->first();

        $agencia = Agencias::where('id',$contrato->agencia_id)->update([
            'membresia_id' => $contrato->membresia_id
        ]);

        if($countSuscripcion == null){
            $suscripcion = Suscripcion::create([
                'user_id' => $user_id,
                'agencia_id' => $contrato->agencia_id,
                'membresia_id' => $contrato->membresia_id,
                'contrato_id' => $contrato->id,
                'plan' => $contrato->plan,
                'preapproval_id' => $request->preapproval_id,
                'active' => 1
            ]);
        }else{
            $mpService = new MPService();

            $response = $mpService->update_suscription($countSuscripcion->preapproval_id,'cancelled');

            $suscripcion = Suscripcion::where('user_id',$user_id)->where('id',$countSuscripcion->id)->update([
                'membresia_id' => $contrato->membresia_id,
                'plan' => $contrato->plan,
                'contrato_id' => $contrato->id,
                'preapproval_id' => $request->preapproval_id,
                'active' => 1
            ]);
        }

        $suscripcion = Suscripcion::where('user_id',$user_id)->where('active',1)->first();

        $contratos = Contrato::where('id',$contrato->id)->update([
            'status' => 'Pagado'
        ]);

        $membresia = Membresias::where('id',$contrato->membresia_id)->first();

        $agencia = Agencias::where('id',$contrato->agencia_id)->first();

        return view('usuario.user-membresia-success',compact('suscripcion','membresia','contrato','agencia'));
    }

    public function perfil_membresia_get_paused(){
        $user_id = auth()->user()->id;

        $mpService = new MPService();
        $suscripcion = Suscripcion::where('user_id',$user_id)->where('active',0)->orderBy('created_at','desc')->first();
        $response = $mpService->get_paused_suscriptions($suscripcion->preapproval_id);
        
        return $response;
    }

    public function cancel_subcription(Request $request){
        $user_id = auth()->user()->id;

        $mpService = new MPService();

        $response = $mpService->update_suscription(auth()->user()->suscripcion->preapproval_id,'cancelled');
    
        return $response;
    }

    public function pause_subcription(Request $request){
        $user_id = auth()->user()->id;

        $mpService = new MPService();

        $response = $mpService->update_suscription(auth()->user()->suscripcion->preapproval_id,'paused');
    
        return $response;
    }

    public function reviews(){
        $user_id = auth()->user()->id;

        $reviews = Reviews::where('user_id',$user_id)->get();
        return view('usuario.user-reviews',compact('reviews'));
    }

    public function agencies(){
        $user_id = auth()->user()->id;

        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->get();
        return view('usuario.user-agencies',compact('agencias'));
    }

    public function agencies_claim(){
        $user_id = auth()->user()->id;

        $claims = ClaimAgency::where('user_id',$user_id)->get();
        return view('usuario.user-agencies-claim',compact('claims'));

    }

    public function agency_solicitar(){
        $marcas = Marcas::all();
        return view('usuario.user-agency-solicitar',compact('marcas'));
    }

    public function agency_solicitar_add(Request $request){

        request()->validate([
            'razon_social' => 'required',
            'marca' => 'required',
            'no_instrumento' => 'required',
            'acta_volumen' => 'required',
            'acta_fecha' => 'required',
            'acta_localidad' => 'required',
            'acta_numero' => 'required',
            'acta_datos' => 'required',
            'datos_no_instrumento' => 'required',
            'datos_volumen' => 'required',
            'datos_fecha' => 'required',
            'datos_localidad' => 'required',
            'datos_notario' => 'required',
            'datos_datos' => 'required',
            'rfc_rfc' => 'required',
            'rfc_numero' => 'required',
            'rfc_volumen' => 'required',
            'rfc_fecha' => 'required',
            'rfc_domicilio' => 'required',
            'rfc_telefono' => 'required',
            'rfc_email' => 'required',
            'direccion' => 'required',
            'place_id' => 'required',

            'ine' => 'required',
            'acta_constitutiva' => 'required',
            'identificacion' => 'required',
            'poder_notarial' => 'required',
            'hoja_registro' => 'required',
            'comprobante' => 'required',
            'check_confirmo' => 'required',
        ],[
            'razon_social.required' => 'Ingresa la razón social.',
            'marca.required' => 'Seleccione la marca de la agencia.',
            'no_instrumento.required' => 'Ingresa el número de instrumento para acta constitutiva.',
            'acta_volumen.required' => 'Ingresa el volumen para acta constitutiva.',
            'acta_fecha.required' => 'Ingresa la fecha del acta constitutiva.',
            'acta_localidad.required' => 'Ingresa la localidad del acta constitutiva.',
            'acta_numero.required' => 'Ingresa número de notario del acta constitutiva.',
            'acta_datos.required' => 'Ingresa datos de inscripción del acta constitutiva.',
            'datos_no_instrumento.required' => 'Ingresa datos del Número de Instrumento.',
            'datos_volumen.required' => 'Ingresa datos del Volumen.',
            'datos_fecha.required' => 'Ingresa datos de la fecha de celebración.',
            'datos_localidad.required' => 'Ingresa datos de Localidad.',
            'datos_notario.required' => 'Ingresa el número de notario.',
            'datos_datos.required' => 'Ingresa datos de inscripción.',
            'rfc_rfc.required' => 'Ingresa el RFC.',
            'rfc_numero.required' => 'Ingresa el número de RFC.',
            'rfc_volumen.required' => 'Ingresa el volumen de RFC.',
            'rfc_fecha.required' => 'Ingresa la fecha de RFC.',
            'rfc_domicilio.required' => 'Ingresa el domicilio de RFC.',
            'rfc_telefono.required' => 'Ingresa el teléfono del RFC.',
            'rfc_email.required' => 'Ingresa el email del RFC.',
            'direccion.required' => 'Ingresa la dirección de la agencia.',
            'place_id.required' => 'Busca en el mapa hasta que se llene el campo Place ID.',
            
            'ine.required' => 'Falto subir tu INE.',
            'acta_constitutiva.required' => 'Falto subir tu acta constitutiva.',
            'identificacion.required' => 'Falto subir la identificación del apoderado legal.',
            'poder_notarial.required' => 'Falto subir el poder notarial.',
            'hoja_registro.required' => 'Falto subir la hoja de registro del RFC.',
            'comprobante.required' => 'Falto subir el comprobante de domicilio.',
            'check_confirmo.required' => 'Debés de confirmar que la información es válida.',
            
        ]);

        $user_id = auth()->user()->id;

        $solicitud_agencia = SolicitudAgency::create([
            'user_id' => $user_id,
            'marca_id' => $request->marca,
            'razon_social' => $request->razon_social,
            'no_instrumento' => $request->no_instrumento,
            'acta_volumen' => $request->acta_volumen,
            'acta_fecha' => $request->acta_fecha,
            'acta_localidad' => $request->acta_localidad,
            'acta_numero' => $request->acta_numero,
            'acta_datos' => $request->acta_datos,
            'datos_no_instrumento' => $request->datos_no_instrumento,
            'datos_volumen' => $request->datos_volumen,
            'datos_fecha' => $request->datos_fecha,
            'datos_localidad' => $request->datos_localidad,
            'datos_notario' => $request->datos_notario,
            'datos_datos' => $request->datos_datos,
            'rfc_rfc' => $request->rfc_rfc,
            'rfc_numero' => $request->rfc_numero,
            'rfc_volumen' => $request->rfc_volumen,
            'rfc_fecha' => $request->rfc_fecha,
            'rfc_domicilio' => strval($request->rfc_domicilio),
            'rfc_telefono' => $request->rfc_telefono,
            'rfc_email' => $request->rfc_email,
            'direccion' => strval($request->direccion),
            'lat' => strval($request->lat),
            'lng' => strval($request->lng),
            'place_id' => $request->place_id,
            'place_name' => $request->place_name,
        ]);

        $ine = $this->uploadImage($request,$solicitud_agencia->id,'ine');
        $acta_constitutiva = $this->uploadImage($request,$solicitud_agencia->id,'acta_constitutiva');
        $identificacion = $this->uploadImage($request,$solicitud_agencia->id,'identificacion');
        $poder_notarial = $this->uploadImage($request,$solicitud_agencia->id,'poder_notarial');
        $hoja_registro = $this->uploadImage($request,$solicitud_agencia->id,'hoja_registro');
        $comprobante = $this->uploadImage($request,$solicitud_agencia->id,'comprobante');

        $updateSol = SolicitudAgency::where('id',$solicitud_agencia->id)->update([
            'ine' => $ine,
            'acta_constitutiva' => $acta_constitutiva,
            'identificacion' => $identificacion,
            'poder_notarial' => $poder_notarial,
            'hoja_registro' => $hoja_registro,
            'comprobante' => $comprobante,
        ]);

        $admins= User::role('Admin')->get();

        foreach($admins as $admin){
            $admin->notify(new SolicitudAgencyNoti($solicitud_agencia));
        }

        Mail::to(auth()->user()->email)->send(new SolicitudRegisterAgency($solicitud_agencia));

        return redirect()->route('user.agencies')->with('status_agencia','Tu solicitud de agencia se guardo correctamente. Te avisaremos el estatus vía correo electrónico.');
    }
    
    public function uploadImage($request,$solicitud_id,$input)
    {
        if ($request->hasFile($input)) {
            $file = $request->file($input);
            $name = $file->getClientOriginalName();
            $nameResult = $this->generateNameFileS($name);

            request()->file($input)->storeAs('public', 'agencias/solicitudes-agencias/s'.$solicitud_id.'/' . $nameResult);

            return $nameResult;
        } else {
            return null;
        }

    }

    public function generateNameFileS($value)
    {
        $link = html_entity_decode($value);
        $link = $this->deleteAccentsS($link);
        $link = strtolower($link); //paso todo a minisculas
        $link = preg_replace("/[^ A-Za-z0-9_.-]/", '', $link); //quito los caracteres que no sean letras o numeros
        $link = str_replace(' ', '-', $link);

        return $link;
    }

    public function deleteAccentsS($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return utf8_encode($cadena);
    }

    public function agencies_stats($agency){
        $agencia = Agencias::where('id',$agency)->with(['reviews','hours','qr','fotos','suscripcion'])->withCount(['reviews','fotos'])->first();

        $countAtencion = 0;
        $atencion = 0;
        $finAtencion = 0;
        $practicidad = 0;
        $countPracticidad = 0;
        $finPracticidad = 0;
        $velocidad = 0;
        $countVelocidad = 0;
        $finVelocidad = 0;
        $resultado = 0;
        $countResultado = 0;
        $finResultado = 0;
        $rating = 0;
        $countRating = 0;
        $finRating = 0;
        
        foreach($agencia->reviews as $rev){

            if($rev->atencion){
                $atencion += $rev->atencion;
                $countAtencion ++;
                $finAtencion = $atencion / $countAtencion;
            }
            if($rev->practicidad){
                $practicidad += $rev->practicidad;
                $countPracticidad ++;
                $finPracticidad = $practicidad / $countPracticidad;
            }
            if($rev->velocidad){
                $velocidad += $rev->velocidad;
                $countVelocidad ++;
                $finVelocidad = $velocidad / $countVelocidad;
            }
            if($rev->resultado){
                $resultado += $rev->resultado;
                $countResultado ++;
                $finResultado = $resultado / $countResultado;
            }
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }
        $finAtencion = number_format($finAtencion,2);
        $finPracticidad = number_format($finPracticidad,2);
        $finVelocidad = number_format($finVelocidad,2);
        $finResultado = number_format($finResultado,2);
        $finRating = number_format($finRating,1);

        $reviewsByDay = Reviews::where('agencia_id',$agency)->orderBy('created_at','ASC')->whereNotNull('created_at')->limit(8)->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d M Y'); 
        });

        $reviewsByMonth = Reviews::where('agencia_id',$agency)->orderBy('created_at','ASC')->whereNotNull('created_at')->limit(12)->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('M Y'); 
        });

        $reviewsByYear = Reviews::where('agencia_id',$agency)->orderBy('created_at','ASC')->whereNotNull('created_at')->limit(10)->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y'); 
        });

        $dateIni = $agencia->created_at;
        $key = Settings::where('nombre','ApiKeyG')->first();

        if ($agencia->membresia_id == 1){
            return redirect()->route('user.membresia.activar',$agencia->id);
        }else{
            return view('usuario.user-agency-stats',compact('agencia','finRating','countAtencion','finAtencion','finPracticidad','finVelocidad','finResultado','reviewsByDay','reviewsByMonth','reviewsByYear','dateIni','key'));
        }
    }

    public function add_horario(Request $request){
        $agencia_id = $request->agencia_id;
        if ($request->clun) {
            $lun = "Cerrado";
        } else {
            $lun = $request->ilun . ' - ' . $request->elun;
        }
        if ($request->cmar) {
            $mar = "Cerrado";
        } else {
            $mar = $request->imar . ' - ' . $request->emar;
        }
        if ($request->cmie) {
            $mie = "Cerrado";
        } else {
            $mie = $request->imie . ' - ' . $request->emie;
        }
        if ($request->cjue) {
            $jue = "Cerrado";
        } else {
            $jue = $request->ijue . ' - ' . $request->ejue;
        }
        if ($request->cvie) {
            $vie = "Cerrado";
        } else {
            $vie = $request->ivie . ' - ' . $request->evie;
        }
        if ($request->csab) {
            $sab = "Cerrado";
        } else {
            $sab = $request->isab . ' - ' . $request->esab;
        }
        if ($request->cdom) {
            $dom = "Cerrado";
        } else {
            $dom = $request->idom . ' - ' . $request->edom;
        }
        $horario = AgencyHorario::where('agencia_id',$agencia_id)->first();

        if($horario == null){
            $horario = AgencyHorario::create([
                'agencia_id' => $agencia_id,
                'lun' => $lun,
                'mar' => $mar,
                'mie' => $mie,
                'jue' => $jue,
                'vie' => $vie,
                'sab' => $sab,
                'dom' => $dom,
            ]);
            $agencia = Agencias::where('id',$agencia_id)->update([
                'horario'=> 1
            ]);
        }else{
            $horario = AgencyHorario::where('agencia_id',$agencia_id)->update([
                'lun' => $lun,
                'mar' => $mar,
                'mie' => $mie,
                'jue' => $jue,
                'vie' => $vie,
                'sab' => $sab,
                'dom' => $dom,
            ]);
        }

       

        return redirect()->back()->with('status_hor','Se actualizo el horario de la agencia.');
    }

    public function agency_add_foto(Request $request){

        $agencia_id = $request->agencia_id;

        if ($request->hasFile("foto_upload")) {
            $file = $request->file("foto_upload");
            $name = $file->getClientOriginalName();
            $nameResult = $this->generateNameFile($name);

            /* request()->file("foto_upload")->storeAs('public', 'agencias/'. $agencia_id. '/' . $nameResult); */

            $ruta = storage_path() . '/app/public/agencias/'.$agencia_id;

            if (!file_exists($ruta)) {
                mkdir($ruta, 755, true);
            }

            $ruta = storage_path() . '/app/public/agencias/'.$agencia_id. '/' . $nameResult;

            Image::make($request->file('foto_upload'))->save($ruta);

            $imagen =  $nameResult;
            $foto = Fotos::create([
                'agencia_id' => $agencia_id,
                'foto_upload' => $imagen
            ]);
        } else {
            $imagen =  null;
        }

        return redirect()->back()->with('status_qr','Se subio la foto con éxito.');
    }

    public function ver_contrato(Request $request){
        $agencia = Agencias::where('id',$request->agencia)->with(['contrato'])->first();
        $contrato = Contrato::where('id',$agencia->contrato->id)->with(['membresia','user'])->first();

        if($contrato->type_solicitud == "solicitud-agencia"){
            $solicitud = SolicitudAgency::where('id',$contrato->solicitud_id)->first();
        }else{
            $solicitud = Solicitud::where('id',$contrato->solicitud_id)->first();
        }


        $pdf = PDF::loadView('usuario.contrato.anexo', ['contrato' => $contrato,'agencia'=> $agencia,'solicitud' => $solicitud ]);
        return $pdf->stream('contrato-anexo.pdf');
    }

    public function agency_delete_foto(Request $request){

        $foto = Fotos::where('id',$request->foto_delete)->delete();
        return redirect()->back()->with('status_qr','La foto se elimino con éxito.');
    }

    public function agency_update_telefono(Request $request){

        $foto = Agencias::where('id',$request->agencia_id)->update([
            'telefono' => $request->telefono
        ]);
        return redirect()->back()->with('status_qr','El teléfono de la agencia se actualizo.');
    }

    public function agency_qr(Request $request){
        $nameQr = 'agencias/qr-'. $request->agencia_id.'.png';

        $qr = AgencyQr::where('agencia_id',$request->agencia_id)->first();

        if($qr == null){
            $qr = AgencyQr::create([
                'agencia_id' => $request->agencia_id,
                'qr' => $nameQr,
            ]);
            $qrImage = \QrCode::size(500)
            ->format('png')
            ->generate($request->url);
    
            Storage::disk('public')->put($nameQr,$qrImage);

        }
        $qr = AgencyQr::where('id',$qr->id)->first();
        $pathFile = storage_path('app/public/'.$qr->qr);
        return response()->download($pathFile);
        
    }

    public function download_qr($qr_id){
       /*  $qr = AgencyQr::where('id',$qr_id)->first();

        $pathFile = storage_path('app/public/'.$qr->qr);

        return response()->download($pathFile); */
    }

    public function claim_agency(Request $request){
        $user_id = auth()->user()->id;

        //TODO: enviar correo a usuario y administración sobre el reclamo de agencia

        $claim = ClaimAgency::create([
            'user_id' => $user_id,
            'agencia_id' => request()->agencia_id
        ]);

        return redirect()->route('agencia.detalles',$request->agencia_id)->with('status_claim','Reclamaste esta agencia con éxito. Espera una respuesta a tu correo electrónico.');

    }

    public function data_reviews(){
        $agencia_id = request()->agencia;
        $periodo = request()->periodo;
        $arraCount = [];
        
        if($periodo == 'anio'){
            
            $anio = Date('Y');
            $arraAnios = array($anio-3,$anio-2,$anio-1,$anio-0);
            
            foreach ($arraAnios as $anio){
                $count = Reviews::where('agencia_id',$agencia_id)->whereNotNull('created_at')->whereYear('created_at',$anio)->count();
                
                array_push($arraCount,$count);
            }
            return $arraCount;
            
        }else if($periodo == 'mes'){
            
            $arraMes = array(1,2,3,4,5,6,7,8,9,10,11,12);
            $anio_mes = request()->anio_mes;
            foreach($arraMes as $mes){
                $count = Reviews::where('agencia_id',$agencia_id)->whereNotNull('created_at')->whereMonth('created_at',$mes)->whereYear('created_at',$anio_mes)->count();

                array_push($arraCount,$count);
            }
            return $arraCount;
        }else if($periodo == 'range'){

            if(request()->range_in){
                $in = request()->range_in;
            }else{
                $in = Date('Y-m-d',strtotime('-1 year'));
            }
            if(request()->range_end){
                $end = Date('Y-m-d',strtotime(request()->range_end.'+1 days'));
            }else{
                $end = Date('Y-m-d',strtotime('+1 day'));
            }
            $range_period = request()->range_period;
            $range_periodo = "Y";
            if($range_period == "anio"){
                $range = Reviews::where('agencia_id',$agencia_id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->get()->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('Y'); 
                });
            }else if ($range_period == "mes"){
                $range = Reviews::where('agencia_id',$agencia_id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->get()->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('M Y'); 
                });
            }else if ($range_period == "day"){
                $range = Reviews::where('agencia_id',$agencia_id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->get()->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('d M Y'); 
                });
            }   
            return $range;
        }
    }

    public function data_estandar(){
        $agencia_id = request()->agencia;

        if(request()->range_in){
            $in = request()->range_in;
        }else{
            $in = Date('Y-m-d',strtotime('-1 year'));
        }
        if(request()->range_end){
            $end = Date('Y-m-d',strtotime(request()->range_end.'+1 days'));
        }else{
            $end = Date('Y-m-d',strtotime('+1 day'));
        }

        $revs = Reviews::where('agencia_id',$agencia_id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->get();

        $countAtencion = 0;
        $atencion = 0;
        $finAtencion = 0;
        $practicidad = 0;
        $countPracticidad = 0;
        $finPracticidad = 0;
        $velocidad = 0;
        $countVelocidad = 0;
        $finVelocidad = 0;
        $resultado = 0;
        $countResultado = 0;
        $finResultado = 0;
        $rating = 0;
        $countRating = 0;
        $finRating = 0;
        
        foreach($revs as $rev){

            if($rev->atencion){
                $atencion += $rev->atencion;
                $countAtencion ++;
                $finAtencion = $atencion / $countAtencion;
            }
            if($rev->practicidad){
                $practicidad += $rev->practicidad;
                $countPracticidad ++;
                $finPracticidad = $practicidad / $countPracticidad;
            }
            if($rev->velocidad){
                $velocidad += $rev->velocidad;
                $countVelocidad ++;
                $finVelocidad = $velocidad / $countVelocidad;
            }
            if($rev->resultado){
                $resultado += $rev->resultado;
                $countResultado ++;
                $finResultado = $resultado / $countResultado;
            }
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }

        $finAtencion = number_format($finAtencion,2);
        $finPracticidad = number_format($finPracticidad,2);
        $finVelocidad = number_format($finVelocidad,2);
        $finResultado = number_format($finResultado,2);
        $finRating = round($finRating,1);

        $in = Date('d M Y',strtotime($in));
        $end = Date('d M Y',strtotime($end.'-1 day'));

        $array = [$finAtencion,$finPracticidad,$finVelocidad,$finResultado,$countAtencion,$in,$end,$finRating];

        return $array;
    }

    public function personal(){
        $user_id = auth()->user()->id;
        $personal = array();
        
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->orderBy('created_at','DESC')->get();
        $finRatingPersonal = 0;
        $ratingPersonal = 0.0;
        $countRatingPersonal = 0;
        $reviews = 0;
        $atencion = 0;
        $tiempo = 0;
        $conocimiento = 0;
        $finAtencion = 0;
        $finTiempo = 0;
        $finConocimiento = 0;
        if(isset($_GET['agencia'])){
            $person = Personal::where('agencia_id',$_GET['agencia'])->with(['agencia','reviews'])->withCount('reviews')->get();
    
            foreach ($person as $p){
                if(isset($p->reviews)){
                    foreach($p->reviews as $rev){
                        $ratingPersonal += floatval($rev->rating);
                        $atencion += floatval($rev->atencion);
                        $tiempo += floatval($rev->tiempo);
                        $conocimiento += floatval($rev->conocimiento);
                        $countRatingPersonal ++;
                        $finRatingPersonal = $ratingPersonal / $countRatingPersonal;
                        $finAtencion = $atencion / $countRatingPersonal;
                        $finTiempo = $tiempo / $countRatingPersonal;
                        $finConocimiento = $conocimiento / $countRatingPersonal;
                        $reviews ++;
                    }
                }
            }
            array_push($personal,$person);
        }else{
            foreach($agencias as $agencia){
                $person = Personal::where('agencia_id',$agencia->agencia_id)->with(['agencia','reviews'])->withCount('reviews')->get();
    
                foreach ($person as $p){
                    if(isset($p->reviews)){
                        foreach($p->reviews as $rev){
                            $ratingPersonal += floatval($rev->rating);
                            $atencion += floatval($rev->atencion);
                            $tiempo += floatval($rev->tiempo);
                            $conocimiento += floatval($rev->conocimiento);
                            $countRatingPersonal ++;
                            $finRatingPersonal = $ratingPersonal / $countRatingPersonal;
                            $finAtencion = $atencion / $countRatingPersonal;
                            $finTiempo = $tiempo / $countRatingPersonal;
                            $finConocimiento = $conocimiento / $countRatingPersonal;
                            $reviews ++;
                        }
                    }
                }
                array_push($personal,$person);
            }
        }

        $finRatingPersonal = round($finRatingPersonal,1);
        $finAtencion = round($finAtencion,1);
        $finTiempo = round($finTiempo,1);
        $finConocimiento = round($finConocimiento,1);

        $dateIni = $agencias[0]->created_at;

        return view('usuario.user-personal',compact('personal','agencias','finRatingPersonal','reviews','finAtencion','finTiempo','finConocimiento','dateIni'));
        /* $citas = Cita::with('agencia')->get(); */
    }

    public function data_reviews_personal(){
        $personal_id = request()->agencia;
        $finRatingPersonal = 0;
        $ratingPersonal = 0.0;
        $countRatingPersonal = 0;
        $reviews = 0;
        $atencion = 0;
        $tiempo = 0;
        $conocimiento = 0;
        $finAtencion = 0;
        $finTiempo = 0;
        $finConocimiento = 0;

        if(request()->range_in){
            $in = request()->range_in;
        }else{
            $in = Date('Y-m-d',strtotime('-1 year'));
        }
        if(request()->range_end){
            $end = Date('Y-m-d',strtotime(request()->range_end.'+1 days'));
        }else{
            $end = Date('Y-m-d',strtotime('+1 day'));
        }

        $user_id = auth()->user()->id;
        
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->orderBy('created_at','DESC')->get();
        
        foreach($agencias as $agencia){
            $person = Personal::where('agencia_id',$agencia->agencia_id)->with(['agencia','reviews'])->withCount('reviews')->get();
            
            foreach ($person as $p){
                if(isset($p->reviews)){
                    $revs = PersonalReviews::where('personal_id',$p->id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->get();
                    
                    foreach($revs as $rev){
                        $ratingPersonal += floatval($rev->rating);
                        $atencion += floatval($rev->atencion);
                        $tiempo += floatval($rev->tiempo);
                        $conocimiento += floatval($rev->conocimiento);

                        $countRatingPersonal ++;
                        $finRatingPersonal = $ratingPersonal / $countRatingPersonal;
                        $finAtencion = $atencion / $countRatingPersonal;
                        $finTiempo = $tiempo / $countRatingPersonal;
                        $finConocimiento = $conocimiento / $countRatingPersonal;
                        $reviews ++;
                    }
                }
            }
        }

        $finRatingPersonal = round($finRatingPersonal,1);
        $finAtencion = round($finAtencion,1);
        $finTiempo = round($finTiempo,1);
        $finConocimiento = round($finConocimiento,1);

        $in = Date('d M Y',strtotime($in));
        $end = Date('d M Y',strtotime($end.'-1 day'));

        $array = [$finAtencion,$finTiempo,$finConocimiento,$in,$end,$reviews,$finRatingPersonal];

        return $array;
    }

    public function personal_ver($personal_id){
        $user_id = auth()->user()->id;

        $finRatingPersonal = 0;
        $ratingPersonal = 0.0;
        $countRatingPersonal = 0;
        $reviews = 0;
        $atencion = 0;
        $tiempo = 0;
        $conocimiento = 0;
        $finAtencion = 0;
        $finTiempo = 0;
        $finConocimiento = 0;
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->orderBy('created_at','DESC')->get();

        $personal = Personal::where('id',$personal_id)->with('reviews')->withCount('reviews')->first();

        if(request()->range_in){
            $in = request()->range_in;
        }else{
            $in = Date('Y-m-d',strtotime('-1 year'));
        }
        if(request()->range_end){
            $end = Date('Y-m-d',strtotime(request()->range_end.'+1 days'));
        }else{
            $end = Date('Y-m-d',strtotime('+1 day'));
        }

        if(isset($personal->reviews)){

            $revs = PersonalReviews::where('personal_id',$personal->id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->get();
            
            foreach($revs as $rev){
                $ratingPersonal += floatval($rev->rating);
                $atencion += floatval($rev->atencion);
                $tiempo += floatval($rev->tiempo);
                $conocimiento += floatval($rev->conocimiento);
                $countRatingPersonal ++;
                $finRatingPersonal = $ratingPersonal / $countRatingPersonal;
                $finAtencion = $atencion / $countRatingPersonal;
                $finTiempo = $tiempo / $countRatingPersonal;
                $finConocimiento = $conocimiento / $countRatingPersonal;
                $reviews ++;
            }
        }

        $finRatingPersonal = round($finRatingPersonal,1);
        $finAtencion = round($finAtencion,1);
        $finTiempo = round($finTiempo,1);
        $finConocimiento = round($finConocimiento,1);

        $dateIni = $personal->created_at;

        return view('usuario.user-personal-ver',compact('personal','finRatingPersonal','finAtencion','finTiempo','finConocimiento','dateIni','agencias'));
    }

    public function data_reviews_personal_ver(){
        $personal_id = request()->personal_id;

        if(request()->range_in){
            $in = request()->range_in;
        }else{
            $in = Date('Y-m-d',strtotime('-1 year'));
        }
        if(request()->range_end){
            $end = Date('Y-m-d',strtotime(request()->range_end.'+1 days'));
        }else{
            $end = Date('Y-m-d',strtotime('+1 day'));
        }

        $finRatingPersonal = 0;
        $ratingPersonal = 0.0;
        $countRatingPersonal = 0;
        $reviews = 0;
        $atencion = 0;
        $tiempo = 0;
        $conocimiento = 0;
        $finAtencion = 0;
        $finTiempo = 0;
        $finConocimiento = 0;

        $personal = Personal::where('id',$personal_id)->with('reviews')->withCount('reviews')->first();
     
            
        if(isset($personal->reviews)){
            $revs = PersonalReviews::where('personal_id',$personal->id)->whereBetween('created_at',[$in,$end])->orderBy('created_at','ASC')->whereNotNull('created_at')->with('user')->get();
            
            foreach($revs as $rev){
                $ratingPersonal += floatval($rev->rating);
                $atencion += floatval($rev->atencion);
                $tiempo += floatval($rev->tiempo);
                $conocimiento += floatval($rev->conocimiento);
                $countRatingPersonal ++;
                $finRatingPersonal = $ratingPersonal / $countRatingPersonal;
                $finAtencion = $atencion / $countRatingPersonal;
                $finTiempo = $tiempo / $countRatingPersonal;
                $finConocimiento = $conocimiento / $countRatingPersonal;
                $reviews ++;
            }
        }

        $finRatingPersonal = round($finRatingPersonal,1);
        $finAtencion = round($finAtencion,1);
        $finTiempo = round($finTiempo,1);
        $finConocimiento = round($finConocimiento,1);

        $in = Date('d M Y',strtotime($in));
        $end = Date('d M Y',strtotime($end.'-1 day'));

        $array = [$finAtencion,$finTiempo,$finConocimiento,$in,$end,$reviews,$finRatingPersonal];

        return $array;
    }

    public function personal_add(Request $request){
        $imagen= "";

        $personal = Personal::create([
            'agencia_id' => $request->agencia_id,
            'nombre' => $request->nombre,
            'puesto' => $request->puesto,
        ]);

        if ($request->hasFile("perfil")) {
            $file = $request->file("perfil");
            $name = $file->getClientOriginalName();
            $nameResult = $this->generateNameFile($name);

            request()->file("perfil")->storeAs('public', 'personal/'. $personal->id. '/' . $nameResult);

            $imagen =  $nameResult;
            $personalU = Personal::where('id',$personal->id)->update([
                'imagen' => $imagen
            ]);
        } else {
            $imagen =  null;
        }

        return redirect()->back()->with('status_personal','Se añadio el nuevo personal.');
    }

    public function personal_edit(Request $request){
        $imagen= "";

        $personal = Personal::where('id',$request->personal_id)->update([
            'agencia_id' => $request->agencia_id,
            'nombre' => $request->nombre,
            'puesto' => $request->puesto,
        ]);

        if ($request->hasFile("perfil")) {
            $file = $request->file("perfil");
            $name = $file->getClientOriginalName();
            $nameResult = $this->generateNameFile($name);

            request()->file("perfil")->storeAs('public', 'personal/'. $request->personal_id. '/' . $nameResult);

            $imagen =  $nameResult;
            $personalU = Personal::where('id',$request->personal_id)->update([
                'imagen' => $imagen
            ]);
        } else {
            $imagen =  null;
        }

        return redirect()->route('user.personal')->with('status_personal','Se actualizo tu personal.');
    }

    public function personal_delete(Request $request){

        $personal = Personal::where('id',$request->personal_id)->delete();

        $reviews = PersonalReviews::where('personal_id',$request->personal_id)->delete();

        return redirect()->route('user.personal')->with('status_personal','Se elimino a '. $request->nombre .' de tu personal.');
    }

    public function comments(){
        $user_id = auth()->user()->id;
        $reviews = array();
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->get();
        
        if(isset($_GET['agencia'])){
            array_push($reviews,Reviews::where('agencia_id',$_GET['agencia'])->with(['agencia','user'])->withCount('answers')->get());
        }else{
            foreach($agencias as $agencia){
                array_push($reviews,Reviews::where('agencia_id',$agencia->agencia_id)->with(['agencia','user'])->withCount('answers')->get());
            }
        }

        return view('usuario.user-comments',compact('reviews','agencias'));
    }

    public function comentarios_save_respuesta(){

        $answer = ReviewsAnswers::create([
            'review_id' => request()->review_id,
            'user_id' => auth()->user()->id,
            'answer' => request()->respuesta
        ]);

        $answer['review'] = Reviews::find(request()->review_id);

        $autorid = request()->autor_id;
        if($autorid != 0){
            $user = User::find($autorid);
            $user->notify(new AnswerReview($answer));
        }
        return redirect()->back()->with('status_comment','Se guardo con éxito la respuesta.');
    }

    public function comments_see($review_id){

        if(request()->noti){
            DatabaseNotification::find(request()->noti)->markAsRead();
        }

        $rev = Reviews::where('id',$review_id)->with(['answers','agencia'])->first();
        return view('usuario.user-comments-see',compact('rev'));
    }

    public function citas(){
        $user_id = auth()->user()->id;
        $citas = array();
        
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->get();
        if(isset($_GET['agencia'])){
            array_push($citas,Cita::where('agencia_id',$_GET['agencia'])->get());
        }else{

            foreach($agencias as $agencia){
                array_push($citas,Cita::where('agencia_id',$agencia->agencia_id)->get());
            }

        }

        return view('usuario.user-citas',compact('citas','agencias'));
        /* $citas = Cita::with('agencia')->get(); */
    }

    public function citas_ver($cita_id){
        
        $cita = Cita::where('id',$cita_id)->first();

        return view('usuario.user-citas-see',compact('cita'));
        /* $citas = Cita::with('agencia')->get(); */
    }

    public function citas_ask(Request $request){

        $cita = Cita::where('id',$request->cita_id)->update([
            'accept' => $request->respond,
            'notas_dealer' => $request->nota_dealer
        ]);

        $cita = Cita::where('id',$request->cita_id)->first();
        $agencia = Agencias::where('id',$cita->agencia_id)->first();

        if($request->respond == 1){
            $msj = "Aceptaste la solicitud cita con éxito. Se envio un mensaje de correo con el estatus al correo que proporciono el cliente.";
            Mail::to($cita->email)->send(new CitaAccept($cita,$agencia));
            
        }else{
            
            $msj = "Rechazaste la solicitud de cita. Se envio un mensaje de correo con el estatus al correo que proporciono el cliente.";
            Mail::to($cita->email)->send(new CitaDecline($cita,$agencia));

        }

        return redirect()->route('user.citas')->with('status_cita',$msj);
    }

    public function reportes(){
        $user_id = auth()->user()->id;
        $citas = array();
        
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->get();

        $answersCount = ReviewsAnswers::where('user_id',$user_id)->count();
        

        return view('usuario.user-reports',compact('agencias','answersCount'));
        /* $citas = Cita::with('agencia')->get(); */
    }

    public function reporte_comentarios($agencia_id){

        $agencia = Agencias::where('id',$agencia_id)->with(['reviews'])->withCount(['reviews'])->first();

        $countAtencion = 0;
        $atencion = 0;
        $finAtencion = 0;
        $practicidad = 0;
        $countPracticidad = 0;
        $finPracticidad = 0;
        $velocidad = 0;
        $countVelocidad = 0;
        $finVelocidad = 0;
        $resultado = 0;
        $countResultado = 0;
        $finResultado = 0;
        $rating = 0;
        $countRating = 0;
        $finRating = 0;
        
        foreach($agencia->reviews as $rev){

            if($rev->atencion){
                $atencion += $rev->atencion;
                $countAtencion ++;
                $finAtencion = $atencion / $countAtencion;
            }
            if($rev->practicidad){
                $practicidad += $rev->practicidad;
                $countPracticidad ++;
                $finPracticidad = $practicidad / $countPracticidad;
            }
            if($rev->velocidad){
                $velocidad += $rev->velocidad;
                $countVelocidad ++;
                $finVelocidad = $velocidad / $countVelocidad;
            }
            if($rev->resultado){
                $resultado += $rev->resultado;
                $countResultado ++;
                $finResultado = $resultado / $countResultado;
            }
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }
        $finAtencion = number_format($finAtencion,1);
        $finPracticidad = number_format($finPracticidad,1);
        $finVelocidad = number_format($finVelocidad,1);
        $finResultado = number_format($finResultado,1);
        $finRating = number_format($finRating,1);

        $reviewsByDay = Reviews::where('agencia_id',$agencia_id)->whereDay('created_at',date('d'))->whereNotNull('created_at')->count();

        $reviewsByMonth = Reviews::where('agencia_id',$agencia_id)->whereMonth('created_at',date('m'))->whereNotNull('created_at')->count();

        $reviewsByYear = Reviews::where('agencia_id',$agencia_id)->whereYear('created_at',date('Y'))->whereNotNull('created_at')->count();

        $answers = Reviews::where('agencia_id',$agencia_id)->get();
        $countAnswers = 0;
        foreach($answers as $answer){
            $countAnswers += ReviewsAnswers::where('review_id',$answer->id)->count();
        }

        $pdf = PDF::loadView('usuario.reporte.comentarios', ['agencia' => $agencia,'rating'=> $finRating,'atencion'=> $finAtencion,'practicidad'=> $finPracticidad,'velocidad'=> $finVelocidad,'resultado' => $finResultado,'reviewsByYear' =>$reviewsByYear,'reviewsByMonth' => $reviewsByMonth ,'reviewsByDay' => $reviewsByDay, 'countAnswers' => $countAnswers ]);
        return $pdf->stream('reporte-comentarios.pdf');
        /* return $pdf->download('reporte-comentarios.pdf'); */
    }

    public function reporte_agencia($agencia_id){

        $agencia = Agencias::where('id',$agencia_id)->with(['reviews'])->withCount(['reviews'])->first();

        $countAtencion = 0;
        $atencion = 0;
        $finAtencion = 0;
        $practicidad = 0;
        $countPracticidad = 0;
        $finPracticidad = 0;
        $velocidad = 0;
        $countVelocidad = 0;
        $finVelocidad = 0;
        $resultado = 0;
        $countResultado = 0;
        $finResultado = 0;
        $rating = 0;
        $countRating = 0;
        $finRating = 0;
        
        foreach($agencia->reviews as $rev){

            if($rev->atencion){
                $atencion += $rev->atencion;
                $countAtencion ++;
                $finAtencion = $atencion / $countAtencion;
            }
            if($rev->practicidad){
                $practicidad += $rev->practicidad;
                $countPracticidad ++;
                $finPracticidad = $practicidad / $countPracticidad;
            }
            if($rev->velocidad){
                $velocidad += $rev->velocidad;
                $countVelocidad ++;
                $finVelocidad = $velocidad / $countVelocidad;
            }
            if($rev->resultado){
                $resultado += $rev->resultado;
                $countResultado ++;
                $finResultado = $resultado / $countResultado;
            }
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }
        $finAtencion = number_format($finAtencion,2);
        $finPracticidad = number_format($finPracticidad,2);
        $finVelocidad = number_format($finVelocidad,2);
        $finResultado = number_format($finResultado,2);
        $finRating = number_format($finRating,1);

        $pdf = PDF::loadView('usuario.reporte.agencia', ['agencia' => $agencia,'rating'=> $finRating,'atencion'=> $finAtencion,'practicidad'=> $finPracticidad,'velocidad'=> $finVelocidad,'resultado' => $finResultado ]);
        return $pdf->stream('reporte-calificacion-agencia.pdf');
        /* return $pdf->download('reporte-comentarios.pdf'); */
    }
    public function reporte_mes($agencia_id){

        $agencia = Agencias::where('id',$agencia_id)->with(['reviews'])->withCount(['reviews'])->first();

        $countAtencion = 0;
        $atencion = 0;
        $finAtencion = 0;
        $practicidad = 0;
        $countPracticidad = 0;
        $finPracticidad = 0;
        $velocidad = 0;
        $countVelocidad = 0;
        $finVelocidad = 0;
        $resultado = 0;
        $countResultado = 0;
        $finResultado = 0;
        $rating = 0;
        $countRating = 0;
        $finRating = 0;
        
    
        $reviewsByMonth = Reviews::where('agencia_id',$agencia_id)->whereMonth('created_at',date('m'))->whereNotNull('created_at')->get();

        foreach($reviewsByMonth as $rev){
            if($rev->atencion){
                $atencion += $rev->atencion;
                $countAtencion ++;
                $finAtencion = $atencion / $countAtencion;
            }
            if($rev->practicidad){
                $practicidad += $rev->practicidad;
                $countPracticidad ++;
                $finPracticidad = $practicidad / $countPracticidad;
            }
            if($rev->velocidad){
                $velocidad += $rev->velocidad;
                $countVelocidad ++;
                $finVelocidad = $velocidad / $countVelocidad;
            }
            if($rev->resultado){
                $resultado += $rev->resultado;
                $countResultado ++;
                $finResultado = $resultado / $countResultado;
            }
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }
        $finAtencion = number_format($finAtencion,2);
        $finPracticidad = number_format($finPracticidad,2);
        $finVelocidad = number_format($finVelocidad,2);
        $finResultado = number_format($finResultado,2);
        $finRating = number_format($finRating,1);

        $countAnswers = 0;
        foreach($reviewsByMonth as $answer){
            $countAnswers += ReviewsAnswers::where('review_id',$answer->id)->count();
        }

        $pdf = PDF::loadView('usuario.reporte.mes', ['agencia' => $agencia,'rating'=> $finRating,'atencion'=> $finAtencion,'practicidad'=> $finPracticidad,'velocidad'=> $finVelocidad,'resultado' => $finResultado,'reviewsByMonth' => $countRating , 'countAnswers' => $countAnswers ]);
        return $pdf->stream('reporte-mes.pdf');
        /* return $pdf->download('reporte-comentarios.pdf'); */
    }

    public function reporte_empleados($agencia_id){

        $agencia = Agencias::where('id',$agencia_id)->with(['personal_and_reviews'])->withCount(['personal'])->first();

        $pdf = PDF::loadView('usuario.reporte.empleados', ['agencia' => $agencia ]);
        return $pdf->stream('reporte-empleados.pdf');
        /* return $pdf->download('reporte-comentarios.pdf'); */
    }

    public function reporte_mensual($agencia_id){

        $agencia = Agencias::where('id',$agencia_id)->with(['reviews'])->withCount(['reviews','personal'])->first();

        $countAtencion = 0;
        $atencion = 0;
        $finAtencion = 0;
        $practicidad = 0;
        $countPracticidad = 0;
        $finPracticidad = 0;
        $velocidad = 0;
        $countVelocidad = 0;
        $finVelocidad = 0;
        $resultado = 0;
        $countResultado = 0;
        $finResultado = 0;
        $rating = 0;
        $countRating = 0;
        $finRating = 0;
        
        $reviewsByMonth = Reviews::where('agencia_id',$agencia_id)->whereMonth('created_at',date('m',strtotime('- 1 month')))->whereNotNull('created_at')->get();

        foreach($reviewsByMonth as $rev){
            if($rev->atencion){
                $atencion += $rev->atencion;
                $countAtencion ++;
                $finAtencion = $atencion / $countAtencion;
            }
            if($rev->practicidad){
                $practicidad += $rev->practicidad;
                $countPracticidad ++;
                $finPracticidad = $practicidad / $countPracticidad;
            }
            if($rev->velocidad){
                $velocidad += $rev->velocidad;
                $countVelocidad ++;
                $finVelocidad = $velocidad / $countVelocidad;
            }
            if($rev->resultado){
                $resultado += $rev->resultado;
                $countResultado ++;
                $finResultado = $resultado / $countResultado;
            }
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }
        $finAtencion = number_format($finAtencion,2);
        $finPracticidad = number_format($finPracticidad,2);
        $finVelocidad = number_format($finVelocidad,2);
        $finResultado = number_format($finResultado,2);
        $finRating = number_format($finRating,1);

        $countAnswers = 0;
        foreach($reviewsByMonth as $answer){
            $countAnswers += ReviewsAnswers::where('review_id',$answer->id)->count();
        }

        $pdf = PDF::loadView('usuario.reporte.mensual', ['agencia' => $agencia,'rating'=> $finRating,'atencion'=> $finAtencion,'practicidad'=> $finPracticidad,'velocidad'=> $finVelocidad,'resultado' => $finResultado,'reviewsByMonth' => $countRating , 'countAnswers' => $countAnswers ]);
        return $pdf->stream('reporte-mensual.pdf');
        /* return $pdf->download('reporte-comentarios.pdf'); */
    }

    public function notifications(){
        $notifications = auth()->user()->notifications;
        $user = auth()->user()->unreadNotifications->markAsRead();
        return view('usuario.user-notifications',compact('notifications'));
    }

    public function generateNameFile($value){
        $link = html_entity_decode($value);
        $link = $this->deleteAccents($link);
        $link = strtolower($link); //paso todo a minisculas
        $link = preg_replace("/[^ A-Za-z0-9_.-]/", '', $link); //quito los caracteres que no sean letras o numeros
        $link = str_replace(' ', '-', $link);

        return $link;
    }

    public function deleteAccents($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return utf8_encode($cadena);
    }
    
}
