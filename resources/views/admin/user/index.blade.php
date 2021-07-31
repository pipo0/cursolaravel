@extends('admin.layouts.main')
@section('title', 'LISTA DE USUARIOS')
@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-primary">Nuevo Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TIPO</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>
                    <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger btn-eliminar" title="Eliminar">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success" title="Editar">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary" title="Detalle">
                        <span class="glyphicon glyphicon-eye"></span> Detalle
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection

@section('javascript')
    <script>
        $('.btn-eliminar').on('click',function(event){
            event.preventDefault();
            if(confirm('Esta seguro de eliminar el registro?')){
                $(location).attr('href', $(this).attr('href'));
            }
        });
    </script>
@endsection