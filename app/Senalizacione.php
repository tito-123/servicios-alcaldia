<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senalizacione extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
       public $incrementing = false;
    protected $fillable = [
        'codigo', 'imagen', 'detalle','id_categoria','id_tipo',
    ];

}
