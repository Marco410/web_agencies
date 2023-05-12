<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PersonalReviews extends Model
{
    use HasFactory;
    protected $table= "personal_has_reviews";

    protected $fillable = [
        'atencion', 'tiempo', 'conocimiento','rating','text','personal_id','user_id'
    ];

    public function personal(){
        return $this->hasMany(Personal::class, 'id','personal_id');
    }

    public function user(){
        return $this->hasMany(User::class, 'id','user_id');
    }

}
