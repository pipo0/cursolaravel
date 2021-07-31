<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // LISTAR USUARIOS
        // $users=User::all();  // Sin paginador
        $users=User::orderBy('id', 'ASC')->paginate(5);
        //dd($users);
        $data['users']=$users;
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // MOSTRAR VISTA DE FORMULARIO
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // GUARDAR USUARIO
        // 1. Obtener datos a guardar
        $user=new User($request->all());
        // 2. Cifrar password
        $user->password=bcrypt($user->password);
        // 3. Guardar en la BD
        $user->save();
        flash('Usuario '.$user->name.' fue registrado exitosamente')->success();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // DETALLE
        // 1. Buscar el registro a mostrar
        $data['user']=User::find($id);
        return view('admin.user.detail', $data);
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
        $data['user']=User::find($id);
        return view('admin.user.edit', $data);
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
        $user=User::find($id);
        // 2. Actualizar datos desde el formulario
        $user->name=$request->name;
        $user->email=$request->email;
        $user->type=$request->type;
        // 3. Guardar cambios
        $user->save();
        // 4. Enviar mensaje al listado
        flash('Usuario '.$user->name.' fue editado exitosamente')->success();
        return redirect()->route('user.index');
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
        $user=User::find($id);
        // 2. Eliminar registro
        $user->delete();
        flash('Usuario '.$user->name.' fue eliminado exitosamente')->success();
        return redirect()->route('user.index');
    }
}
