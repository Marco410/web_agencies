<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion','link'
    ];

    public function agencias(){
        return $this->belongsToMany(Agencias::class,'agencia_has_marca','marca_id','agencia_id')->get();
    }
}
