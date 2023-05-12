<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table= "contacto";

    protected $fillable = [
        'nombre','apellidos','email','telefono','msj'
    ];
}
