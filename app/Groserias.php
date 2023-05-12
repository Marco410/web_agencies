<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groserias extends Model
{
    use HasFactory;
    protected $table= "groserias";

    protected $fillable = [
        'groseria','active'
    ];

}
