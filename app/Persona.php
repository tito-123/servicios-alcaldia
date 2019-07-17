<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    public $incrementing = false;
     protected $fillable = [
        'nombre', 'ap_paterno', 'ap_materno','ci','foto',
    ];

}
