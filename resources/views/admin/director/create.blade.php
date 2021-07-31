@extends('admin.layouts.main')
@section('title', 'NUEVO DIRECTOR')
@section('content')
    @include('admin.layouts.errors')
    {!! Form::open(['route'=>'director.store', 'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre del director:') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del director', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection
