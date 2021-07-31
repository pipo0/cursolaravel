@extends('admin.layouts.main')
@section('title', 'NUEVO USUARIO')
@section('content')
    @include('admin.layouts.errors')
    {!! Form::open(['route'=>'user.store', 'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre completo', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo electronico:') !!}
            {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contrasena:') !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contrasena', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo de usuario:') !!}
            {!! Form::select('type', ['member'=>'Miembro','admin'=>'Administrador'], null, ['class'=>'form-control', 'placeholder'=>'Seleccione una opcion', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection
