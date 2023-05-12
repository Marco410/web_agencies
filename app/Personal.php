<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Personal extends Model
{
    use HasFactory;
    protected $table= "agencia_has_personal";

    protected $fillable = [
        'agencia_id', 'nombre', 'puesto','imagen'
    ];

    public function agencia(){
        return $this->hasMany(Agencias::class, 'id','agencia_id');
    }

    public function reviews(){
        return $this->hasMany(PersonalReviews::class, 'personal_id')->orderBy('created_at','DESC');
    }

}
