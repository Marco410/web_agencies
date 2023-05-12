<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table= "citas";

    protected $fillable = [
        'nombre', 'agencia_id', 'apellidos','email','telefono','motivo','tipo_cliente','contacto','motivo_cita','date_cita'
    ];

    public function agencia(){
        return $this->hasMany(Agencias::class, 'id','agencia_id');
    }

}
