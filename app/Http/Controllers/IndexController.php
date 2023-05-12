<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agencias;
use App\Marcas;
use App\Estados;
use App\Settings;
use App\ClaimAgency;
use App\Contacto;
use App\User;
use App\Reviews;
use App\Personal;
use App\PersonalReviews;
use App\Cita;
use App\UserAgency;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notify;

use App\Notifications\NewReview;
use App\Notifications\NewReviewPersonal;
use App\Notifications\NewCita;

use App\Notifications\ContactoNoti;
use Illuminate\Notifications\DatabaseNotification;

class IndexController extends Controller
{
    public function index(){
        $marcas = Marcas::where('active',1)->get();
        $estados = Estados::with('municipios')->get();
        $agenciasTop = Agencias::orderBy('rating','DESC')->with('marca')->limit(6)->get();
        return view('index',compact('marcas','agenciasTop','estados'));
    }

    public function agencias(Request $request){
        //si selecciona todos los filtro
        if($request->marca && $request->estado && $request->municipio){

            if($request->order == 'm_ranking'){
                $agencias = Agencias::where('estado',$request->estado)->whereIn('ciudad',$request->municipio)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','ASC');
            }else if($request->order == 'ma_ranking'){
                $agencias = Agencias::where('estado',$request->estado)->whereIn('ciudad',$request->municipio)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','DESC');
            } else if($request->order == 'm_comentarios'){
                $agencias = Agencias::where('estado',$request->estado)->whereIn('ciudad',$request->municipio)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('reviews_count','ASC');

            }else if($request->order == 'ma_comentarios'){
                $agencias = Agencias::where('estado',$request->estado)->whereIn('ciudad',$request->municipio)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('reviews_count','DESC');
            }else{
                $agencias = Agencias::where('estado',$request->estado)->whereIn('ciudad',$request->municipio)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','DESC');
            }

            //si solo selecciona estado y municipio
        }else if (!isset($request->marca) && $request->estado && $request->municipio){
            
           
            if($request->order == 'm_ranking'){
                $agencias = Agencias::whereIn('estado',$request->estado)->whereIn('ciudad',$request->municipio)->withCount('reviews')->orderBy('rating','ASC');
            }else if($request->order == 'ma_ranking'){

                $agencias = Agencias::whereIn('estado',$request->estado)->whereIn('ciudad',$request->municipio)->withCount('reviews')->orderBy('rating','DESC');
            }
            else if($request->order == 'm_comentarios'){
                $agencias = Agencias::whereIn('estado',$request->estado)->whereIn('ciudad',$request->municipio)->withCount('reviews')->orderBy('reviews_count','ASC');

            }else if($request->order == 'ma_comentarios'){
                $agencias = Agencias::whereIn('estado',$request->estado)->whereIn('ciudad',$request->municipio)->withCount('reviews')->orderBy('reviews_count','DESC');
            }else{
                $agencias = Agencias::whereIn('estado',$request->estado)->whereIn('ciudad',$request->municipio)->withCount('reviews')->orderBy('rating','DESC');
            }
            //si solo selecciona marca y estado
        }else if ($request->marca && $request->estado && !isset($request->municipio) ) {
            if($request->order == 'm_ranking'){
                $agencias = Agencias::whereIn('estado',$request->estado)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','ASC');
            }else if($request->order == 'ma_ranking'){

                $agencias = Agencias::whereIn('estado',$request->estado)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','DESC');
            }
            else if($request->order == 'm_comentarios'){
                $agencias = Agencias::whereIn('estado',$request->estado)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('reviews_count','ASC');

            }else if($request->order == 'ma_comentarios'){
                $agencias = Agencias::whereIn('estado',$request->estado)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('reviews_count','DESC');
            }
            else{
                $agencias = Agencias::whereIn('estado',$request->estado)->whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','DESC');
            }
            //si solo selecciona estado
        }else if (!isset($request->marca) && $request->estado && !isset($request->municipio) ) {
            
           
            if($request->order == 'm_ranking'){
                $agencias = Agencias::whereIn('estado',$request->estado)->withCount('reviews')->orderBy('rating','ASC');
            }else if($request->order == 'ma_ranking'){

                $agencias = Agencias::whereIn('estado',$request->estado)->withCount('reviews')->orderBy('rating','DESC');
            }
            else if($request->order == 'm_comentarios'){
                $agencias = Agencias::whereIn('estado',$request->estado)->withCount('reviews')->orderBy('reviews_count','ASC');

            }else if($request->order == 'ma_comentarios'){
                $agencias = Agencias::whereIn('estado',$request->estado)->withCount('reviews')->orderBy('reviews_count','DESC');
            }else{
                $agencias = Agencias::whereIn('estado',$request->estado)->withCount('reviews')->orderBy('rating','DESC');
            }
            //si solo selecciona marca
        }else if ($request->marca && !isset($request->estado) && $request->estado == null && !isset($request->municipio) ) {
            
           
            if($request->order == 'm_ranking'){
                $agencias = Agencias::whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','ASC');
            }else if($request->order == 'ma_ranking'){

                $agencias = Agencias::whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','DESC');
            }else if($request->order == 'm_comentarios'){
                $agencias = Agencias::whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('reviews_count','ASC')->orderBy('rating','DESC');

            }else if($request->order == 'ma_comentarios'){
                $agencias = Agencias::whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('reviews_count','DESC')->orderBy('rating','DESC');
            }
            else{
                $agencias = Agencias::whereHas('marca',function($query) use ($request){
                    $query->whereIn('nombre',$request->marca);
                })->withCount('reviews')->orderBy('rating','DESC');
            }
        }

        //si no selecciona ninguna
        else if (!isset($request->marca) && !isset($request->estado) && $request->estado == null && !isset($request->municipio)){
            
            if($request->order == 'm_ranking'){
                $agencias = Agencias::withCount('reviews')->orderBy('rating','ASC');
            }else if($request->order == 'ma_ranking'){
                $agencias = Agencias::withCount('reviews')->orderBy('rating','DESC');
            }else if($request->order == 'm_comentarios'){
                $agencias = Agencias::withCount('reviews')->orderBy('reviews_count','ASC')->orderBy('rating','DESC');
            }else if($request->order == 'ma_comentarios'){
                $agencias = Agencias::withCount('reviews')->orderBy('reviews_count','DESC')->orderBy('rating','DESC');
            }else{
                $agencias = Agencias::withCount('reviews')->orderBy('rating','DESC');
            }
        }
        
        $agenciasall = $agencias->with('marca')->withCount(['fotos'])->get();
        $agencias = $agencias->with('marca')->withCount(['fotos'])->paginate(10);
        $agenciasCount = $agencias->total();
        
        if ($request->ajax()){
            $view = view('agencias_data',compact('agencias'))->render();
            return response()->json(['html' => $view,'countAgencias'=>$agenciasCount]);
        }
        
        $marcas = Marcas::where('active',1)->get();
        $estados = Estados::with('municipios')->get();
        $key = Settings::where('nombre','ApiKeyG')->first();

        if($agenciasCount == 0){
            $errorResults = "No hay resultados para esos filtros";
            $agenciasTop = Agencias::orderBy('rating','DESC')->with('marca')->limit(6)->get();
            
            return redirect()->route('index')->with('errorResults','No hay resultados para esos filtros');
        }

        return view('agencias',compact('agencias','marcas','agenciasCount','estados','key','agenciasall'));
    }

    //detalles de agencia
    public function agencia_details($agencia){
        $agencia = Agencias::where('id',$agencia)->with(['marca','fotos','reviews','personal','hours'])->first();

        if(auth()->user()){
            $claimOwn = ClaimAgency::where('user_id',auth()->user()->id)->where('agencia_id',$agencia->id)->where('active',1)->count();
            $claim = ClaimAgency::where('agencia_id',$agencia->id)->where('active',1)->count();
        }else{
            $claimOwn = "";
            $claim = "";
        }

        $finRating = 0;
        $rating = 0;
        $countRating = 0;
        foreach($agencia->reviews as $rev){
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }

        $agenciaUpdate = Agencias::where('id',$agencia->id)->update([
            'rating' => round($finRating,1)
        ]);

        $finRating = round($finRating,1);

        $key = Settings::where('nombre','ApiKeyG')->first();
        return view('agencia_detalles',compact('agencia','key','claimOwn','claim','finRating'));
    }

    public function agencia_create_cita(Request $request){

        request()->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'motivo' => 'required',
            'tipo_cliente' => 'required',
            'contacto' => 'required',
            'motivo_cita' => 'required',
            'date_cita' => 'required',

        ],[
            'nombre.required' => 'Ingresa tu nombre',
            'apellidos.required' => 'Ingresa tus apellidos',
            'email.required' => 'Ingresa tus correo electrónico',
            'telefono.required' => 'Ingresa tu número de teléfono',
            'motivo.required' => 'Ingresa el motivo de la cita',
            'tipo_cliente.required' => 'Ingresa tu tipo de cliente',
            'contacto.required' => 'Ingresa la forma de contacto',
            'motivo_cita.required' => 'Ingresa el motivo de tu cita.',
            'date_cita.required' => 'Selecciona la fecha de tu cita.',
        ]);

        $cita = Cita::create([
            'agencia_id' => $request->agencia_id,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'motivo' => $request->motivo,
            'tipo_cliente' => $request->tipo_cliente,
            'contacto' => $request->contacto,
            'motivo_cita' => $request->motivo_cita,
            'date_cita' => $request->date_cita
        ]);

        $users = UserAgency::where('agencia_id',$request->agencia_id)->with(['user','agencia'])->first();

        if($users != null){
            $user = User::where('id',$users->user_id)->first();
            $user->notify(new NewCita($cita));
        }

        return back()->with('status_cita','Cita Generada');
    }

    public function brands(Request $request){
        
        if($request->marca){
            $marcas = Marcas::where('nombre','like','%'.$request->marca.'%')->where('active',1)->paginate(10);
        }else{
            $marcas = Marcas::where('active',1)->get();
        }

        if ($request->ajax()){
            
            $view = view('brands_data',compact('marcas'))->render();
            if($marcas->count() == 0){
                return 0;
            }else{
                return $view;
            }

        }
        
        return view('brands',compact('marcas'));
    }

    public function contacto(){
        return view('contact-us');
    }

    public function contacto_store(){

        $msj = Contacto::create([
            'nombre' => request()->nombre,
            'apellidos' => request()->apellidos,
            'email' => request()->email,
            'telefono' => request()->telefono,
            'msj' => request()->msj
        ]);

        $admins= User::role('Admin')->get();

        foreach($admins as $admin){
            $admin->notify(new ContactoNoti($msj));
        }
            $email = Settings::where('nombre','correo')->first();
            $msj = "Hay un nuevo mensaje de contacto.";
            Mail::to($email->value)->send(new Notify($msj));

        return back()->with('status-contacto','¡Muchas gracias! Hemos recibido tus comentarios y en breve nos pondremos en contacto contigo');
    }

    public function nosotros(){
        return view('about-us');
    }

    public function store_review(Request $request){

        $atencion = intval(request()->atencion);
        $practicidad = intval(request()->practicidad);
        $velocidad = intval(request()->velocidad);
        $resultado = intval(request()->resultado);
        $comentario = request()->comentario;

        $rating = ($atencion + $practicidad + $velocidad + $resultado) / 4;

        $review = Reviews::create([
            'agencia_id'=> request()->agencia_id,
            'user_id'=> auth()->user()->id,
            'atencion' => $atencion,
            'practicidad' => $practicidad,
            'velocidad' => $velocidad,
            'resultado' => $resultado,
            'rating' => $rating,
            'text' => $comentario
        ]);

        $admins= User::role('Admin')->get();

        foreach($admins as $admin){
            $admin->notify(new NewReview($review));
        }

        $userAgency = UserAgency::where('agencia_id',request()->agencia_id)->first();

        if($userAgency != null){
            $dealer = User::where('id',$userAgency->user_id)->role('Dealer')->first();
            $dealer->notify(new NewReview($review));
        }


        $email = Settings::where('nombre','correo')->first();
            $msj = "Hay un nuevo comentario en el sitio.";
            Mail::to($email->value)->send(new Notify($msj));

        return $review;
    }

    public function store_review_personal(Request $request){

        $atencion = intval(request()->atencion);
        $tiempo = intval(request()->tiempo);
        $conocimiento = intval(request()->conocimiento);
        $comentario = request()->comentario;

        $rating = ($atencion + $tiempo + $conocimiento ) / 3;

        $review = PersonalReviews::create([
            'personal_id'=> request()->personal_id,
            'user_id'=> auth()->user()->id,
            'atencion' => $atencion,
            'tiempo' => $tiempo,
            'conocimiento' => $conocimiento,
            'rating' => round($rating,1),
            'text' => $comentario
        ]);

        $personal = Personal::where('id',request()->personal_id)->with('reviews')->first();

        $finRating = 0;
        $rating = 0;
        $countRating = 0;
        foreach($personal->reviews as $rev){
            $rating += $rev->rating;
            $countRating ++;
            $finRating = $rating / $countRating;
        }

        $updateRatPer = Personal::where('id',$personal->id)->update([
            'rating' => round($finRating,1)
        ]);

        $user_personal = UserAgency::where('agencia_id',$personal->agencia_id)->first();

        $dealer= User::where('id',$user_personal->user_id)->first();
        $dealer->notify(new NewReviewPersonal($review));

        $msj = "Calificaron a una persona de una de tus agencias.";
        Mail::to($dealer->email)->send(new Notify($msj));

        return $review;
    }
}