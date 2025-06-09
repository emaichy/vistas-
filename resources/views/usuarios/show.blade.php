@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Usuario</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $usuario->ID_Usuario }}</p>
            <p><strong>Correo:</strong> {{ $usuario->Correo }}</p>
            <p><strong>Rol:</strong> {{ $usuario->Rol }}</p>
            <p><strong>Status:</strong> {{ $usuario->Status == 1 ? 'Activo' : 'Inactivo'}}</p>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
