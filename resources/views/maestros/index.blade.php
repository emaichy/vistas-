@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Maestros</h2>
    <a href="{{ route('maestros.create') }}" class="btn btn-primary mb-3">Nuevo Maestro</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Especialidad</th>
                <th>Correo Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maestros as $maestro)
            <tr>
                <td>{{ $maestro->ID_Maestro }}</td>
                <td>{{ $maestro->Nombre }} {{ $maestro->ApePaterno }} {{ $maestro->ApeMaestro }}</td>
                <td>{{ $maestro->Especialidad }}</td>
                <td>{{ $maestro->usuario->Correo ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('maestros.show', $maestro->ID_Maestro) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('maestros.edit', $maestro->ID_Maestro) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('maestros.destroy', $maestro->ID_Maestro) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
