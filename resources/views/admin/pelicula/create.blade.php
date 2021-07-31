@extends('admin.layouts.main')
@section('title', 'NUEVA PELICULA')
@section('content')
    @include('admin.layouts.errors')
    {!! Form::open(['route'=>'pelicula.store', 'method'=>'POST', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo:') !!}
            {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Titulo de la pelicula', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('costo', 'Costo:') !!}
            {!! Form::number('costo', null, ['class'=>'form-control', 'placeholder'=>'Costo de la pelicula', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('resumen', 'Resumen:') !!}
            {!! Form::textarea('resumen', null, ['class'=>'form-control', 'placeholder'=>'Resumen de la pelicula', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('estreno', 'Fecha de estreno:') !!}
            {!! Form::date('estreno', null, ['class'=>'form-control', 'placeholder'=>'Fecha de estreno de la pelicula', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('genero_id', 'Genero:') !!}
            {!! Form::select('genero_id', $generos, null, ['class'=>'form-control', 'placeholder'=>'Genero de la pelicula', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('directores', 'Directores:') !!}
            {!! Form::select('directores[]', $directores, null, ['class'=>'form-control', 'placeholder'=>'Directores de la pelicula', 'multiple', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagen', 'Imagen:') !!}
            {!! Form::file('imagen') !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection
