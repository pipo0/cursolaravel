<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    // NONBRE DE LA TABLA
    protected $table='directores';
    // DEFINIR LOS CAMPOS TRANSACCIONALES
    protected $fillable=['nombre'];

    // UN DIRECTOR TIENE MUCHAS PELICULAS
    public function peliculas(){
        return $this->belongsToMany('App\Pelicula', 'director_pelicula');
    }

    // BUSCADOR
    public function scopeSearch($query, $nombre){
        return $query->where('nombre', 'LIKE', '%'.$nombre.'%');
    }
}
