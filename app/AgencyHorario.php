<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyHorario extends Model
{
    use HasFactory;

    protected $table= "agencia_has_horario";

    protected $fillable = [
        'agencia_id','lun','mar','mie','jue','vie','sab','dom'
    ];

    
    public function agencia(){
        return $this->hasOne(Agencias::class, 'id','agencia_id');
    }
}
