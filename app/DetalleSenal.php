<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
class DetalleSenal extends Model
{
	public $incrementing = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario', 'id_senal', 
    ];

     protected function setKeysForSaveQuery(Builder $query)
    {
        $query->where('id_usuario', '=', $this->getAttribute('id_usuario'))
            ->where('id_senal', '=', $this->getAttribute('id_senal'));
        return $query;
    }
}
