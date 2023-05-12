<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Reviews extends Model
{
    use HasFactory;
    protected $table= "agencia_has_reviews";

    protected $fillable = [
        'atencion', 'practicidad', 'velocidad','resultado','text','rating','user_id','agencia_id','autor','autor_url','foto_url','time'
    ];

    public function agencia(){
        return $this->hasOne(Agencias::class, 'id','agencia_id');
    }
    
    public function user(){
        return $this->hasMany(User::class, 'id','user_id');
    }

    public function answers(){
        return $this->hasMany(ReviewsAnswers::class, 'review_id');
    }

}
