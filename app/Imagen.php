<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    // NONBRE DE LA TABLA
    protected $table='imagenes';
    // DEFINIR LOS CAMPOS TRANSACCIONALES
    protected $fillable=['nombre','pelicula_id'];

    // UNA IMAGEN PERTENECE A UNA PELICULA
    public function pelicula(){
        return $this->belongsTo('App\Pelicula');
    }
}
