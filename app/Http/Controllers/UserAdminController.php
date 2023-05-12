<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\User;
use App\UserAgency;
use App\Agencias;
use App\Contrato;
use App\Solicitud;
use App\SolicitudAgency;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;

class UserAdminController extends Controller
{
    use HasRoles;

    public function __construct()
     {
         $this->middleware('web');
    }

    public function edit($id)
    {
        //
        $user = User::where('id',$id)->with(['agencies','suscripcion'])->first();
        $users = User::all();

        return view('admin.users.edit' , ['user' => $user , 'users' => $users]);
    }

    public function user_agency_delete(Request $request){

        $user_agency = UserAgency::where('user_id',$request->user_delete_id)->where('agencia_id',$request->agencia_delete_id)->delete();

        return redirect()->back()->with('status','Se elimino la agencia del usuario.');
    }

    public function user_baja_plan(Request $request){

        $user = User::where('id',$request->user_plan_id)->update([
            'membresia_id' => 1
        ]);

        return redirect()->back()->with('status','Se dio de baja correctamente.');
    }

    public function update(Request $request)
    {
        //
        $id = $request->input("id");
        $name = $request->input("name");
        $apellido_p = $request->input("apellido_p");
        $apellido_m = $request->input("apellido_m");
        $email = $request->input("email");
        $rol = $request->input("rol");

        if($request->input('block')){
            $block = 1;
        }else{
            $block = 0;
        }

        $user = User::find($id);
        $user->name = $name;
        $user->apellido_p = $apellido_p;
        $user->apellido_m = $apellido_m;
        $user->email = $email;
        $user->block = $block;
        $user->save();
        $user->removeRole($user->roles[0]->name);
        $user->assignRole($rol);

        return redirect('admin/usuarios')->with('status','Usuario actualizado con éxito');
    }

    public function delete(Request $request)
    {
        
        $id  =  $request->input("id");

        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return response(json_encode($id), 200)->header('Content-type', 'text/plain');
    }

    public function recover(Request $request)
    {
        
        $id  =  $request->input("id");

        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return response(json_encode($id), 200)->header('Content-type', 'text/plain');
    }

    public function destroy(Request $request)
    {
        $id  =  $request->input("id");

        $user = User::find($id);
        $user->delete();
        return response(json_encode($id), 200)->header('Content-type', 'text/plain');
    }

    public function add()
    {
        return view('admin.users.add');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function store(Request $request)
    {

        request()->validate([
            'email' => ['required','email','unique:users,email'],
            'nombre' => 'required',
            'apellido_p' => 'required',
            'password' => 'required|min:8',
            'password_confirm' => 'required|required_with:password|same:password',
        ],[
            'email.unique' => 'Este correo ya se encuentra registrado',
            'email.required' => 'Ingresa un correo electronico valido',
            'email.email' => 'Ingresa un correo electronico valido',
            'nombre.required' => 'Ingresa tu nombre',
            'apellido_p.required' => 'Ingresa tu Apellido Paterno',
            'password.required' => 'Ingresa una contraseña',
            'password.min' => 'Ingresa una contraseña de más de 8 caracteres.',
            'password_confirm.same' => 'Las contraseñas deben de coincidir.'
        ]);

        $user = User::create([
            'name' => $request['nombre'],
            'email' => $request['email'],
            'apellido_p' => $request['apellido_p'],
            'apellido_m' => $request['apellido_m'],
            'telefono' => $request['telefono'],
            'password' => Hash::make($request['password']),
        ])->assignRole('Dealer');

        Mail::to($user->email)->send(new UserRegister($user));

        return redirect()->route('users')->with('status','Usuario creado con éxito.');

    }

    public function asign_agency($user_id){
        $user = User::where('id',$user_id)->first();
        return view('admin.users.user-asign-agency' , ['user' => $user]);
    }

    public function asign_agency_store($user_id,$agencia_id){

        $agencyClaim = UserAgency::where('user_id',$user_id)->where('agencia_id',$agencia_id)->count();

        if($agencyClaim == 0){

            $agencyClaim2 = UserAgency::where('agencia_id',$agencia_id)->count();

            if($agencyClaim2 == 0){
                UserAgency::create([
                    'user_id' => $user_id,
                    'agencia_id' => $agencia_id,
                ]);
    
                return redirect()->route('users.see-agencies-asign',$user_id)->with('status','Se asigno la agencia con éxito.');
            }else{
                return redirect()->route('users.asign.agency',$user_id)->with('error','La agencia seleccionada ya tiene dueño.');

            }
        }else{
            return redirect()->route('users.see-agencies-asign',$user_id)->with('status','Esta agencia ya es parte del usuario.');
            
        }
    }

    public function see_agencies_asign($user_id){
        $user = User::where('id',$user_id)->first();
        $agencias = UserAgency::where('user_id',$user_id)->with('agencia')->get();
        
        return view('admin.users.user-agencies' , compact(['user','agencias']));

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

}
