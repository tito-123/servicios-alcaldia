<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insidencia extends Model
{
    //
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 public $incrementing = false;
        protected $fillable = [
        'observacion', 'fecha', 'imagen','id_usuario',
    ];

}
