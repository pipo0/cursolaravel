@extends('admin.layouts.main')
@section('title', 'NUEVO GENERO')
@section('content')
    @include('admin.layouts.errors')
    {!! Form::open(['route'=>'genero.store', 'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('genero', 'Genero:') !!}
            {!! Form::text('genero', null, ['class'=>'form-control', 'placeholder'=>'Genero de la pelicula', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection
