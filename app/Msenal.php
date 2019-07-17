<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msenal extends Model
{
    //
    public $incrementing = false;
      protected $fillable = [
        'detalle', 'codigo', 'imagen','categoria','tipo','estado',
    ];
}
