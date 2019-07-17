<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'name', 'email', 'password','id_persona','id_tipo_usu','id_estado_usu',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  public function scopeName($query, $name)
    {
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }
    public function scopeTipo($query, $tipo)
    {
        if($tipo)
            return $query->where('id_tipo_usu', '=', $tipo);
    }
      public function scopeEstado($query, $estado)
    {
        if($estado)
            return $query->where('id_estado_usu', '=', $estado);
    }

   
}
