<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAgency extends Model
{
    use HasFactory;
    protected $table= "solicitudes_agencias";

    protected $fillable = [
        'user_id', 'marca_id' ,'razon_social','no_instrumento','acta_volumen','acta_fecha','acta_localidad','acta_numero','acta_datos','datos_no_instrumento','datos_volumen','datos_fecha','datos_localidad','datos_notario','datos_datos','rfc_rfc','rfc_numero','rfc_volumen','rfc_fecha','rfc_domicilio','rfc_telefono','rfc_email','direccion','place_id','ine','acta_constitutiva','identificacion','poder_notarial','hoja_registro','comprobante','place_name'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function marca(){
        return $this->hasOne(Marcas::class, 'id','marca_id');
    }

}
