@extends('admin.layouts.main')
@section('title', 'EDITAR DIRECTOR')
@section('content')
    {!! Form::open(['route'=>['director.update', $director], 'method'=>'PUT']) !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre del director:') !!}
            {!! Form::text('nombre', $director->nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del director', 'required']) !!}        
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar Cambios', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection