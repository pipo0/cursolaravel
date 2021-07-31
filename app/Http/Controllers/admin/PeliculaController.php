<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Genero;
use App\Director;
use App\Pelicula;
use App\Imagen;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // MOSTRAR VISTA DE FORMULARIO
        $data['generos']=Genero::orderBy('genero', 'ASC')->pluck('genero','id');
        $data['directores']=Director::orderBy('nombre', 'ASC')->pluck('nombre','id');
        return view('admin.pelicula.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recuperar datos del formulario
        $pelicula=new Pelicula($request->all());
        // dd($pelicula->titulo);
        // Recuperar id del usuario logeado
        $pelicula->user_id=\Auth::user()->id;
        $pelicula->save();
        // dd($request->directores);
        // Guarda relacion director_pelicula
        $pelicula->directores()->sync($request->directores);
        
        // Manipulacion de archivos
        // Validar la imagen
        if($request->hasFile('imagen')){
            // Recuperar el archivo
            $file=$request->file('imagen');
            // dd($file);
            // Definir nombre unico del archivo
            $name_file='cinema_'.time().'.'.$file->getClientOriginalExtension();
            // dd($name_file);
            // Directorio donde se guardara el archivo
            $path_file=public_path().'/imagenes/pelicula';
            // Guardar el archivo
            $file->move($path_file, $name_file);
        }
        // Guardar nombre de imagen en la BD
        $imagen=new Imagen();
        $imagen->nombre=$name_file;
        // Asociar imagen con la pelicula
        $imagen->pelicula()->associate($pelicula);
        $imagen->save();
        return "La pelicula fue guardada";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
