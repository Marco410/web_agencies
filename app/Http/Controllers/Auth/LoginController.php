<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserVerifyMail;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_admin(Request $request)
    {
        $datosUser = request()->only('email','password');
        $datosUser = request()->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.failed' => 'Correo no encontrado',
        ]);

        $user = DB::table('users')->where('email',$datosUser['email'])->first();


        if($user && $user->active == 1 ){
            if(Hash::check($datosUser['password'], $user->password))
            {
                if($user->verify == 0){
                    return redirect()->route('index')->with('errorL','Necesitas verificar tu correo electrónico. Checa tu bandeja de entrada o spam. Si no, da <a href="'.route('admin.login.ree.send.email',$user->email).'"> clic aquí </a> para reenviar el correo.');
                }
                Auth::guard('web')->loginUsingId($user->id);

                if(auth()->user()->roles[0]->name == "Admin"){
                    return redirect()->route('dashboard');
                }else if (auth()->user()->roles[0]->name == "Dealer"){
                    return redirect()->route('user.perfil');
                }else{
                    return redirect()->route('index');

                }

            }else{
                return redirect()->route('admin.login')->with('errorL','La contraseña es incorrecta');
            }

        }else{
            return redirect()->route('admin.login')->with('errorL','Esta cuenta de correo no esta registrada');
        }
    }

    public function login_user(Request $request)
    {
        $datosUser = request()->only('email','password');

        $datosUser = request()->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.failed' => 'Correo no encontrado',
        ]);

        $user = DB::table('users')->where('email',$datosUser['email'])->first();

        if($user){
            if(Hash::check($datosUser['password'], $user->password))
            {
                if($user->verify == 0){
                    return redirect()->route('index')->with('errorL','Necesitas verificar tu correo electrónico. Checa tu bandeja de entrada o spam. Si no, da <a href="'.route('admin.login.ree.send.email',$user->email).'"> clic aquí </a> para reenviar el correo.');
                }
                Auth::guard('web')->loginUsingId($user->id);

                if(auth()->user()->roles[0]->name == "Admin"){
                    return redirect()->route('dashboard');
                }else{
                    return back();
                }

            }else{
                return redirect()->route('index')->with('errorL','La contraseña es incorrecta');
            }

        }else{
            return redirect()->route('index')->with('errorL','Esta cuenta de correo no esta registrada');
        }
    }

    public function logout(){
        $admin = true;

        if(auth()->user()){
            if(auth()->user()->roles[0]->name == "Admin"){
                $admin = true;
            }else{
                $admin = false;
            }
    
            Auth::logout();
            if($admin){
                return redirect()->route('admin.login')->with('status','Cerraste la sesión con éxito');
            }else{
                return redirect()->route('index')->with('status','Cerraste la sesión con éxito');
            }
        }else{
            return redirect()->route('index')->with('status','Cerraste la sesión con éxito');
        }

    }
    public function verificar_email($email){
        $user = User::where('email',$email)->update([
            'verify' => 1
        ]);

        if($user != null){
            return redirect()->route('index')->with('status','Tu correo se verifico con éxito. Ahora ya puedes iniciar sesión');
        }else{
            return redirect()->route('index')->with('errorL','Esta cuenta de correo no esta registrada. Registrate para verificar.');
        }
    }


    public function ree_send_email($email){
        Mail::to($email)->send(new UserVerifyMail($email));

        return redirect()->route('index')->with('status','Se verifico tu cuenta de correo con éxito.');

    }
}
