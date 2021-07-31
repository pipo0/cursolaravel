<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    // NONBRE DE LA TABLA
    protected $table='peliculas';
    // DEFINIR LOS CAMPOS TRANSACCIONALES
    protected $fillable=['titulo','costo','resumen','estreno','genero_id','user_id'];

    // UNA PELICULA PERTENECE A UN USUARIO
    public function user(){
        return $this->belongsTo('App\User');
    }

    // UNA PELICULA PERTENECE A UN GENERO
    public function genero(){
        return $this->belongsTo('App\Genero');
    }

    // UNA PELICULA TIENE MUCHAS IMAGENES
    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }

    // UNA PELICULA TIENE MUCHOS DIRECTORES
    public function directores(){
        return $this->belongsToMany('App\Director', 'director_pelicula')->withTimestamps();
    }
}
