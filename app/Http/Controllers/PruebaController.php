<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index(){
        return 'Hola Mundo desde PruebaController';    
    }

    public function saludo($nombre){
        return 'Buenas noches '.$nombre.' desde PruebaController';
    }

    public function mostrarVista(){
        return view('prueba.vista');
    }

    public function enviarDatos(){
        /*
        // UTILIZANDO WITH
        return view('prueba.datos')
            ->with('nombre', 'Juan')
            ->with('edad', 23);
        */

        /*
        // UTILIZANDO ARRAY
        $data['nombre']='Ana';
        $data['edad']=32;
        //dd($data);
        return view('prueba.datos', $data);
        */
        
        // UTILIZANDO COMPACT
        $nombre='Pedro';
        $edad=54;
        $data=compact('nombre','edad');
        //dd($data);
        return view('prueba.datos', $data);
    }

    public function plantillaBlade(){
        return view('prueba.plantilla');
    }
}
