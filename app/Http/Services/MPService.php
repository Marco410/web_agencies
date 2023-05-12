<?php

namespace App\Http\Services;

use App\Marcas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;



class MPService
{

    public $validationsService;

    public function __construct()
    {
        $this->validationsService = new ValidationsService();
    }

    public function get_suscriptions($preaproval_id)
    {
        $token = env('MP_ACCESS_TOKEN');
            
        $response = Http::withToken($token)->withHeaders([
            'Content-Type' => 'application/json'
        ])->get('https://api.mercadopago.com/preapproval/search?preapproval_id='.$preaproval_id.'&status=authorized');

        return $response;
    }

    public function get_paused_suscriptions($preaproval_id)
    {
        $token = env('MP_ACCESS_TOKEN');
            
        $response = Http::withToken($token)->withHeaders([
            'Content-Type' => 'application/json'
        ])->get('https://api.mercadopago.com/preapproval/search?preapproval_id='.$preaproval_id.'&status=paused');

        return $response;
    }

    public function update_suscription($preaproval_id, $type)
    {
        $token = env('MP_ACCESS_TOKEN');
            
        $response = Http::withToken($token)->withHeaders([
            'Content-Type' => 'application/json'
        ])->put('https://api.mercadopago.com/preapproval/'.$preaproval_id,[
            'status' => $type
        ]);

        return $response;
    }
}
