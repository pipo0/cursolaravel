<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genero;
use App\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // LISTAR
        // $generos=Genero::all();  // Sin paginador
        $generos=Genero::orderBy('id', 'ASC')->paginate(5);
        //dd($generos);
        $data['generos']=$generos;
        return view('admin.genero.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // MOSTRAR VISTA DE FORMULARIO
        return view('admin.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        // GUARDAR
        // 1. Obtener datos a guardar
        $genero=new Genero($request->all());
        // 3. Guardar en la BD
        $genero->save();
        flash('Genero '.$genero->genero.' fue registrado exitosamente')->success();
        return redirect()->route('genero.index');
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
        // MOSTRAR FORMULARIO PARA EDITAR
        // 1. Buscar el registro a editar
        $data['genero']=Genero::find($id);
        return view('admin.genero.edit', $data);
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
        // ACTUALIZA REGISTRO
        // 1. Buscar el registro a actualizar
        $genero=Genero::find($id);
        // 2. Actualizar datos desde el formulario
        $genero->fill($request->all());
        // 3. Guardar cambios
        $genero->save();
        // 4. Enviar mensaje al listado
        flash('Genero '.$genero->genero.' fue editado exitosamente')->success();
        return redirect()->route('genero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ELIMINAR 
        // 1. Buscar el registro a eliminar
        $genero=Genero::find($id);
        // 2. Eliminar registro
        $genero->delete();
        flash('Genero '.$genero->genero.' fue eliminado exitosamente')->success();
        return redirect()->route('genero.index');
    }
}
