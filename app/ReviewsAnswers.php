<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewsAnswers extends Model
{
    use HasFactory;

    protected $table= "reviews_answers";

    protected $fillable = [
        'user_id','review_id','answer'
    ];

    public function review(){
        return $this->hasMany(Review::class, 'id','review_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

}
