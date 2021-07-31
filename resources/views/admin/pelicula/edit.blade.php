@extends('admin.layouts.main')
@section('title', 'EDITAR GENERO')
@section('content')
    {!! Form::open(['route'=>['genero.update', $genero], 'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('genero', 'Genero:') !!}
            {!! Form::text('genero', $genero->genero, ['class'=>'form-control', 'placeholder'=>'Genero de la pelicula', 'required']) !!}        
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection