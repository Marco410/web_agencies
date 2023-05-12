<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresias extends Model
{
    use HasFactory;

    protected $table= "membresias";

    protected $fillable = [
        'membresia','tipo','status'
    ];


}
