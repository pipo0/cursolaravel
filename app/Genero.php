<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    // NONBRE DE LA TABLA
    protected $table='generos';
    // DEFINIR LOS CAMPOS TRANSACCIONALES
    protected $fillable=['genero'];

    // UN GENERO TIENE MUCHAS PELICULAS
    public function peliculas(){
        return $this->hasMany('App\Pelicula');
    }
}
