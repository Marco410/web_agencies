<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\Auth;
use Session;

class SocialLoginController extends Controller
{

    public function login(){

        $redirect_to = request()->redirect_to;
        if(request()->marca){
            $k = 1;
            foreach (request()->marca as $marca){
                $redirect_to.= "&marca[".$k."]=" . $marca;
                $k += 1;
            }
        }
        if(request()->municipio){
            $redirect_to .="&municipio=";
            $i = 1;
            foreach (request()->municipio as $municipio){
                $redirect_to.= "&municipio[".$i."]=" . $municipio;
                $i += 1;
            }
        }
        session(['redirect_page_previous' => $redirect_to ]);

        return Socialite::driver('facebook')->redirect();
    }

    public function callback(Request $request){
        $userFb = Socialite::driver('facebook')->user();
            /* dd($userFb); */
            /* return $userFb->email . $userFb->id; */

            $user = DB::table('users')->where('email',$userFb->email)->first();

            if($user){
                Auth::guard('web')->loginUsingId($user->id);
                return redirect(session('redirect_page_previous'))->with('loginSocial','Iniciaste sesión con éxito');
            }else{
                $user = User::create([
                    'name' => $userFb->name,
                    'apellido_p' => " ",
                    'password' => " ",
                    'email' => $userFb->email,
                    'id_social' => $userFb->id,
                    'register_at' => 'Facebook',
                    'verify' => 1,
                    'avatar' => $userFb->avatar
                ])->assignRole('Suscriptor');
        
                Mail::to($user->email)->send(new UserRegister($user));

                Auth::guard('web')->loginUsingId($user->id);
                
                return redirect(session('redirect_page_previous'))->with('loginSocial','Te has registrado con éxito');
            }
    }

    public function login_google(){

        $redirect_to = request()->redirect_to;
        if(request()->marca){
            $k = 1;
            foreach (request()->marca as $marca){
                $redirect_to.= "&marca[".$k."]=" . $marca;
                $k += 1;
            }
        }
        if(request()->municipio){
            $redirect_to .="&municipio=";
            $i = 1;
            foreach (request()->municipio as $municipio){
                $redirect_to.= "&municipio[".$i."]=" . $municipio;
                $i += 1;
            }
        }
        session(['redirect_page_previous' => $redirect_to ]);

        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        
        /* dd(request()); */
        $userG = Socialite::driver('google')->user();

            $user = DB::table('users')->where('email',$userG->email)->first();


            if($user){
                Auth::guard('web')->loginUsingId($user->id);
                return redirect(session('redirect_page_previous'))->with('loginSocial','Iniciaste sesión con éxito');
            }else{
                $user = User::create([
                    'name' => $userG->name,
                    'apellido_p' => " ",
                    'password' => " ",
                    'email' => $userG->email,
                    'id_social' => $userG->id,
                    'register_at' => 'Google',
                    'verify' => 1,
                    'avatar' => $userG->avatar
                ])->assignRole('Suscriptor');
        
                Mail::to($user->email)->send(new UserRegister($user));

                Auth::guard('web')->loginUsingId($user->id);
                
                return redirect(session('redirect_page_previous'))->with('loginSocial','Te has registrado con éxito');
            }
    }
}
