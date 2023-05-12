<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $table= "estados";
    
    public function municipios()
    {
        return $this->belongsToMany(Municipios::class,'estados_municipios','estados_id','municipios_id');
    }
}
