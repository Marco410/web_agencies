<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;
    protected $table= "agencia_has_fotos";

    protected $fillable = [
        'agencia_id','foto_url','foto_upload'
    ];

}
