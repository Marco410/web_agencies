<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table= "contratos";

    protected $fillable = [
        'user_id','agencia_id','solicitud_id','type_solicitud','membresia_id','plan','status'
    ];

    public function membresia(){
        return $this->hasOne(Membresias::class,'id','membresia_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
