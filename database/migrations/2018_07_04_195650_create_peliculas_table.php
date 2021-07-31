<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->float('costo');
            $table->text('resumen');
            $table->date('estreno');
            $table->timestamps();
            // Adicionar relacion de 1aN con tabla generos
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            // Adicionar relacion de 1aN con tabla users
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
