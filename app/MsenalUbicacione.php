<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsenalUbicacione extends Model
{
    //
    public $incrementing = false;
      protected $fillable = [
        'latitud', 'longitud', 'direccion',
    ];
}
