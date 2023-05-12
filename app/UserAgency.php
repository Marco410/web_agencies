<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAgency extends Model
{
    use HasFactory;

    protected $table= "user_has_agencias";

    protected $fillable = [
        'user_id','agencia_id','status'
    ];

    
    public function agencia(){
        return $this->hasMany(Agencias::class, 'id','agencia_id')->with('contrato');
    }

    public function user(){
        return $this->hasMany(User::class, 'id','user_id');
    }
}
