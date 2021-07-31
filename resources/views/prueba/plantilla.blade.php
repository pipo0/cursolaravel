@extends('admin.layouts.main')
@section('title', 'Componentes Blade')
@section('content')
    <?php
        $nombre='Juan';
        $edad=43;
    ?>

    <h3>IMPRIMIR DATOS</h3>
    Nombre: {{ $nombre }} <br/>
    Edad: {{ $edad }} <br/>
    Suma: {{ $edad + 10 }} <br/>
    Email: {{ $email or 'default' }} <br/>

    <h3>CONDICIONAL</h3>
    @if ($edad>=18)
        <p>Ud es mayor de edad</p>
    @else
        <p>Ud es menor de edad</p>
    @endif

    <h3>BUCLE</h3>
    <?php $nombres=array('Juan','Ana','Marcos','Lucas'); ?>
    <ul>
    @foreach($nombres as $nombre)
        <li>{{ $nombre }}</li>
    @endforeach
    </ul>

    <h3>FUNCIONES PHP</h3>
    Fecha: {{ date('d/m/Y') }}

    @php
        $pais='Bolivia';
        $extension=56600;
    @endphp
@endsection
