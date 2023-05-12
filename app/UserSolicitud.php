<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSolicitud extends Model
{
    use HasFactory;

    protected $table= "user_has_solicitud";

    protected $fillable = [
        'user_id','solicitud_id','status'
    ];

    
    public function solicitud(){
        return $this->hasOne(Solicitud::class, 'id','solicitud_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}
