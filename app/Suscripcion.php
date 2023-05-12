<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table= "suscripcion";

    protected $fillable = [
        'user_id','agencia_id','membresia_id','contrato_id','status','plan','preapproval_id','application_id'
    ];

    public function membresia(){
        return $this->hasOne(Membresias::class,'id','membresia_id');
    }

    public function contrato(){
        return $this->hasOne(Contrato::class,'id','contrato_id');
    }

    public function agencia(){
        return $this->hasOne(Agencias::class,'id','agencia_id');
    }
}
