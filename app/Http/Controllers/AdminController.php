<?php

namespace App\Http\Controllers;

use App\Agencias;
use Illuminate\Http\Request;
use App\Http\Services\BrandService;
use Illuminate\Support\Str;
use App\User;
use App\Marcas;
use App\Reviews;
use App\Contacto;
use App\Settings;
use App\Groserias;
use App\ReviewsAnswers;
use App\Solicitud;
use App\SolicitudAgency;
use App\UserSolicitud;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Notifications\AnswerReview;

use App\Mail\SolicitudRegister;
use App\Mail\SolicitudEstatus;
use App\Mail\SolicitudAgencyEstatus;
use App\Mail\SolicitudAprobar;
use App\Mail\SolicitudAgenciaAprobar;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:Admin']);
    }

    public function dashboard(){

        $users = User::count();
        $dealers = User::role('Dealer')->count();
        $comments = Reviews::count();
        $agencias = Agencias::count();

        return view('admin.index_admin',compact(['users','dealers','comments','agencias']));
    }

    public function users(){
        $users = User::with(['roles'])->orderBy('created_at','DESC')->get();
        return view('admin.users.index_users',compact('users'));
    }

    public function solicitudes(){
        $solicitudes = Solicitud::all();
        return view('admin.solicitud.index_solicitud',compact('solicitudes'));
    }

    public function solicitud_ver($solicitud_id){
        $solicitud = Solicitud::where('id',$solicitud_id)->first();
        return view('admin.solicitud.ficha',compact('solicitud'));
    }

    public function solicitud_rechazar(Request $request,$solicitud_id){
        Solicitud::where('id',$solicitud_id)->update([
            'status_ask' => 1,
            'status' => 2,
            'nota'=> $request->nota
        ]);

        $solicitud = Solicitud::where('id',$solicitud_id)->first();
        Mail::to($solicitud->email)->send(new SolicitudEstatus($solicitud));

        return redirect()->route('solicitud.ver',$solicitud_id)->with('status','Se ha rechazado esta solicitud con éxito. Se ha enviado un correo al usuario con el estatus.');
    }

    public function solicitud_aprobar(Request $request,$solicitud_id){
        Solicitud::where('id',$solicitud_id)->update([
            'status_ask' => 1,
            'status' => 1,
        ]);

        $solicitud = Solicitud::where('id',$solicitud_id)->first();
        $pass = 'AN'.Date('s').substr($solicitud->apellido_p, 0, 2).substr($solicitud->nombre, 0, 2). Date('y'); 
        if($solicitud->membresia == 'Basic'){
            $membresia = 2;
        }else if($solicitud->membresia == 'Plus'){
            $membresia = 3;
        }else{
            $membresia = 1;
        }

        $user = User::where('email',$solicitud->email)->first();

        if($user == null){
            $user = User::create([
                'name' => $solicitud->nombre,
                'email' => $solicitud->email,
                'apellido_p' => $solicitud->apellido_p,
                'apellido_m' => $solicitud->apellido_m,
                'telefono' => $solicitud->telefono,
                'register_at' => 'AutoNavega Solicitud',
                'verify'=> 1,
                'membresia' => $membresia,
                'password' => Hash::make($pass),
            ])->assignRole('Dealer');
            $user['pass'] = $pass;
            Mail::to($solicitud->email)->send(new SolicitudAprobar($solicitud,$user));
        }

        $user_solicitud = UserSolicitud::where('user_id',$user->id)->where('solicitud_id',$solicitud_id)->count();

        if($user_solicitud == 0){
            $user_solicitud = UserSolicitud::create([
                'user_id' => $user->id,
                'solicitud_id' => $solicitud_id,
                'status' => 0
            ]);
        }

        return redirect()->route('users.asign.agency',$user->id)->with('status','Se ha aprobado esta solicitud con éxito. Se ha enviado un correo al usuario con el estatus. Ahora ya puedes asignarle una agencia.');
    }

    public function solicitudes_agencias(){
        $solicitudes = SolicitudAgency::with('user')->orderBy('created_at','DESC')->get();
        return view('admin.solicitud-agencies.index_solicitud',compact('solicitudes'));
    }

    public function solicitud_agencia_ver($solicitud_id){
        $solicitud = SolicitudAgency::where('id',$solicitud_id)->with(['user','marca'])->first();
        return view('admin.solicitud-agencies.ficha',compact('solicitud'));
    }

    public function solicitud_agencia_aprobar(Request $request,$solicitud_id){
        $nota = "";

        if($request->nota){
            $nota = $request->nota;
        }
        
        SolicitudAgency::where('id',$solicitud_id)->update([
            'status_ask' => 1,
            'status' => 1,
            'nota' => $nota
        ]);

        $solicitud = SolicitudAgency::where('id',$solicitud_id)->with('user')->first();

        Mail::to($solicitud->user->email)->send(new SolicitudAgenciaAprobar($solicitud));

        return redirect()->route('solicitud.agency.add',$solicitud_id)->with('status','Se ha aprobado esta solicitud con éxito. Se ha enviado un correo al usuario con el estatus. Ahora añada la nueva agencia');
    }

    public function solicitud_agencia_add($solicitud_id){
        $solicitud = SolicitudAgency::where('id',$solicitud_id)->with(['user','marca'])->first();
        $marcas = Marcas::all();
        return view('admin.solicitud-agencies.agency-add',compact('solicitud','marcas'));
    }

    public function solicitud_agencia_rechazar(Request $request,$solicitud_id){
        SolicitudAgency::where('id',$solicitud_id)->update([
            'status_ask' => 1,
            'status' => 2,
            'nota'=> $request->nota
        ]);

        $solicitud = SolicitudAgency::where('id',$solicitud_id)->with('user')->first();
        Mail::to($solicitud->user->email)->send(new SolicitudAgencyEstatus($solicitud));

        return redirect()->route('solicitudes.agencies',$solicitud_id)->with('status','Se ha rechazado esta solicitud con éxito. Se ha enviado un correo al usuario con el estatus.');
    }

    public function brand(){
        $marcas = Marcas::where('active',1)->get();
        return view('admin.marcas.index',compact('marcas'));
    }

    public function brand_add(){
        return view('admin.marcas.add');
    }

    public function brand_store(Request $request,BrandService $brandService){
        request()->validate([
            'marca' => 'required',
            'descripcion' => 'required',
            'link' => 'required',
            'imagen' => 'required',
        ],[
            'marca.required' => 'Ingresa un nombre a la marca',
            'descripcion.required' => 'Ingresa una descripción a la marca',
            'link.required' => 'Escribe en el nombre de la marca para que se genere un link',
            'imagen.required' => 'Agrega una imagen a la marca',
        ]);

        $resultSaveMarca = $brandService->create($request);
        return redirect()->route('marcas')->with('status','Marca creada con éxito');
    }

    public function settings_index(){

        $correo = Settings::where('nombre','correo')->where('active',1)->first();
        $key = Settings::where('nombre','ApiKeyG')->where('active',1)->first();
        return view('admin.settings.settings-index',compact('correo','key'));

    }

    public function settings_update_correo(Request $request){

        Settings::where('nombre','correo')->update([
            'value' => request()->correo
        ]);
        return redirect()->route('settings.index')->with('status','Correo actualizado correctamente');
    }

    public function settings_update_key(Request $request){

        Settings::where('nombre','ApiKeyG')->update([
            'value' => request()->key
        ]);
        return redirect()->route('settings.index')->with('status','API Key actualizada correctamente');
    }


    // Comentarios
    public function comentarios_index(){

        $agencias = Agencias::all();
        return view('admin.comentarios.index',compact('agencias'));
    }

    public function comentarios_get(){

        $comentarios = Reviews::with(['agencia','user'])->withCount('answers')->orderBy('created_at','ASC')->get();

        $data['data'] = $comentarios;
        return $comentarios;
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
        return redirect()->route('comentarios.see',request()->review_id)->with('status','Se guardo con éxito la respuesta.');
    }

    public function see_review($review_id){

        if(request()->noti){
            DatabaseNotification::find(request()->noti)->markAsRead();
        }

        $rev = Reviews::where('id',$review_id)->with(['answers'])->first();
        return view('admin.comentarios.comment-see',compact('rev'));
    }

    public function comentario_delete(Request $request){

        $review_id = $request->review_id_delete;
        $ans = ReviewsAnswers::where('review_id',$review_id)->delete();
        $rev = Reviews::where('id',$review_id)->delete();
        return redirect()->route('comentarios.index',request()->review_id)->with('status','El comentario y sus respuestas se eliminaron correctamente');
    }

    public function comentario_delete_inAgency(Request $request){

        $review_id = $request->review_id_delete;
        $ans = ReviewsAnswers::where('review_id',$review_id)->delete();
        $rev = Reviews::where('id',$review_id)->delete();

        return redirect()->back()->with('status_claim','El comentario y sus respuestas se eliminaron correctamente');
    }

    public function contacto_msj(){
        $contactos = Contacto::all();
        return view('admin.contacto.contact-index',compact('contactos'));

    }

    public function groserias(){
        $groserias = Groserias::where('active' , 1 )->get();

        return view('admin.groserias.index' , compact('groserias'));
    }

    public function groserias_add(Request $request){
        $groseria = $request->groseria;
        $g = Groserias::create([
            'groseria' => $groseria
        ]);
        return redirect()->route('groserias.index')->with('status','Se añadio la groseria correctamente');
    }

    public function groserias_update(Request $request){
        $groseria_id = $request->groseria_id;
        $groseria = $request->update_groseria;
        $g = Groserias::where('id',$groseria_id)->update([
            'groseria' => $groseria
        ]);
        return redirect()->route('groserias.index')->with('status','Se actualizo la groseria correctamente');
    }

    public function groserias_delete(Request $request){
        $groseria_id = $request->groseria_id_delete;
        $g = Groserias::where('id',$groseria_id)->delete();
        return redirect()->route('groserias.index')->with('status','Se borro la groseria correctamente');
    }


    public function papelera_index(){
        $agencias = Agencias::where('activo' , 0 )->get();

        return view('admin.papelera.agencia' , compact('agencias'));
    }
    public function papelera_marca(){


        $marcas = Marcas::where('active' , 0 )->get();

        return view('admin.papelera.marca' , compact('marcas'));
    }
    public function papelera_user(){


        $users = User::where('active' , 0 )->get();

        return view('admin.papelera.user' , compact('users') );
    }
}