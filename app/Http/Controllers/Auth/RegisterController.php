<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Mail\UserRegister;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
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
            'register_at' => 'AutoNavega',
            'verify'=> 0,
            'password' => Hash::make($request['password']),
        ])->assignRole('Suscriptor');

        Mail::to($user->email)->send(new UserRegister($user));

        return redirect()->route('index')->with('status','Usuario creado con éxito. Ya puedes empezar a hacer comentarios.');

    }
}
