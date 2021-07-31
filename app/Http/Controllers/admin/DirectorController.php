<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Director;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // LISTAR
        // $directores=Director::all();  // Sin paginador
        // $directores=Director::orderBy('id', 'ASC')->paginate(5);
        $directores=Director::search($request->nombre)->orderBy('id', 'ASC')->paginate(5);
        //dd($directores);
        $data['directores']=$directores;
        return view('admin.director.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // MOSTRAR VISTA DE FORMULARIO
        return view('admin.director.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // GUARDAR
        // 1. Obtener datos a guardar
        $director=new Director($request->all());
        // 3. Guardar en la BD
        $director->save();
        flash('Director '.$director->nombre.' fue registrado exitosamente')->success();
        return redirect()->route('director.index');
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
        $data['director']=Director::find($id);
        return view('admin.director.edit', $data);
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
        $director=Director::find($id);
        // 2. Actualizar datos desde el formulario
        $director->fill($request->all());
        // 3. Guardar cambios
        $director->save();
        // 4. Enviar mensaje al listado
        flash('Director '.$director->nombre.' fue editado exitosamente')->success();
        return redirect()->route('director.index');
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
        $director=Director::find($id);
        // 2. Eliminar registro
        $director->delete();
        flash('Director '.$director->nombre.' fue eliminado exitosamente')->success();
        return redirect()->route('director.index');
    }
}
