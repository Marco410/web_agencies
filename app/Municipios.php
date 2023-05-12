<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;
    protected $table= "municipios";

    public function estados()
    {
        return $this->belongsToMany(Estados::class,'estados_municipio','municipios_id','estados_id');
    }

}
