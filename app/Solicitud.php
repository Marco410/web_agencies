<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table= "solicitudes";

    protected $fillable = [
        'nombre', 'apellido_p', 'apellido_m','email','telefono','membresia','empresa','puesto','razon_social','no_instrumento','acta_volumen','acta_fecha','acta_localidad','acta_numero','acta_datos','datos_no_instrumento','datos_volumen','datos_fecha','datos_localidad','datos_notario','datos_datos','rfc_rfc','rfc_numero','rfc_volumen','rfc_fecha','rfc_domicilio','rfc_telefono','rfc_email','ine','acta_constitutiva','identificacion','poder_notarial','hoja_registro','comprobante'
    ];

}
