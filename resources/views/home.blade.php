@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Directores</div>
                <a href="{{ route('director.index') }}" class="btn btn-primary"> Director</a>
                <div class="card-header">Genero</div>
                <a href="{{ route('genero.index') }}" class="btn btn-primary"> Genero</a>
                <div class="card-header">Usuario</div>
                <a href="{{ route('user.index') }}" class="btn btn-primary"> Usuarios</a>
                <div class="card-header">Peliculas</div>
                <div class="card-header">Promociones</div>
                <div class="card-header">Ventas</div>


            </div>
        </div>
    </div>
</div>
@endsection
