@extends('admin.layouts.main')
@section('title', 'LISTA DE DIRECTORES')
@section('content')
    <a href="{{ route('director.create') }}" class="btn btn-primary">Nuevo Director</a>
    {!! Form::open(['route'=>'director.index', 
                    'method'=>'GET', 
                    'class'=>'navbar-form pull-right']) !!}
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar director']) !!}
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
                </div>        
            </div>
        </div>        
    {!! Form::close() !!}
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($directores as $director)
            <tr>
                <td>{{ $director->id }}</td>
                <td>{{ $director->nombre }}</td>
                <td>
                    <a href="{{ route('director.destroy', $director->id) }}" class="btn btn-danger btn-eliminar" title="Eliminar">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="{{ route('director.edit', $director->id) }}" class="btn btn-success" title="Editar">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $directores->links() }}
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