<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipios;
use App\Estados;
use App\Groserias;


class DataController extends Controller
{
    public function get_muni(Request $request){
        
        $request->estado;
        $querys = Estados::where('estado',$request->estado)->with('municipios')->get();
        
        return $querys[0]->municipios;
    }

    public function groserias_get(){
        $groserias = Groserias::all();
        $array = [];
        foreach($groserias as $g){
            array_push($array,$g->groseria);
        }
        return $array;
    }
}
