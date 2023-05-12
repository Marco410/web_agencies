<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyQr extends Model
{
    use HasFactory;

    protected $table= "agencia_has_qr";

    protected $fillable = [
        'agencia_id','qr'
    ];

    
    public function agencia(){
        return $this->hasOne(Agencias::class, 'id','agencia_id');
    }
}
