@extends('admin.layouts.main')
@section('title', 'DETALLE USUARIO')
@section('content')
<table class="table">
    <tr>
        <th>ID</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>USUARIO</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>EMAIL</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>TYPE</th>
        <td>{{ $user->type }}</td>
    </tr>
</table>
@endsection