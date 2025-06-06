@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Listado de Usuarios</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">+ Nuevo Usuario</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->ID_Usuario }}</td>
                <td>{{ $usuario->Correo }}</td>
                <td>{{ $usuario->Rol }}</td>
                <td>{{ $usuario->Status }}</td>
                <td>
                    <a href="{{ route('usuarios.show', $usuario->ID_Usuario) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('usuarios.edit', $usuario->ID_Usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario->ID_Usuario) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Eliminar usuario?')" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
