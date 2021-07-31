@extends('admin.layouts.main')
@section('title', 'LISTA DE GENEROS')
@section('content')
    <a href="{{ route('genero.create') }}" class="btn btn-primary">Nuevo Genero</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>GENERO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generos as $genero)
            <tr>
                <td>{{ $genero->id }}</td>
                <td>{{ $genero->genero }}</td>
                <td>
                    <a href="{{ route('genero.destroy', $genero->id) }}" class="btn btn-danger btn-eliminar" title="Eliminar">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="{{ route('genero.edit', $genero->id) }}" class="btn btn-success" title="Editar">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $generos->links() }}
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