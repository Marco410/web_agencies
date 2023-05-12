<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'direccion','calle','colonia','ciudad','estado','pais','cp','telefono','lat','lng','horario','place_id','rating'
    ];

    public function marca(){
        return $this->belongsToMany(Marcas::class,'agencia_has_marca','agencia_id','marca_id');
    }

    public function fotos(){
        return $this->hasMany(Fotos::class, 'agencia_id')->orderBy('created_at','DESC');
    }

    public function reviews(){
        return $this->hasMany(Reviews::class, 'agencia_id')->orderBy('created_at','DESC');
    }

    public function citas(){
        return $this->hasMany(Cita::class, 'agencia_id');
    }

    public function personal(){
        return $this->hasMany(Personal::class, 'agencia_id');
    }

    public function personal_and_reviews(){
        return $this->hasMany(Personal::class, 'agencia_id')->with('reviews')->withCount('reviews');
    }

    public function qr(){
        return $this->hasOne(AgencyQr::class,'agencia_id','id');
    }

    public function hours(){
        return $this->hasOne(AgencyHorario::class,'agencia_id','id');
    }

    public function suscripcion(){
        return $this->hasOne(Suscripcion::class,'agencia_id','id')->where('active',1)->with('membresia');
    }

    public function contrato(){
        return $this->hasOne(Contrato::class,'agencia_id','id')->where('status','Pagado');
    }
}
