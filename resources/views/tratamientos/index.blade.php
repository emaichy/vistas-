@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Tratamientos</h2>
    <a href="{{ route('tratamientos.create') }}" class="btn btn-primary mb-3">+ Nuevo Tratamiento</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tratamientos as $tratamiento)
                <tr>
                    <td>{{ $tratamiento->ID_Tratamiento }}</td>
                    <td>{{ $tratamiento->NombreTratamiento }}</td>
                    <td>{{ $tratamiento->Status == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('tratamientos.show', $tratamiento->ID_Tratamiento) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('tratamientos.edit', $tratamiento->ID_Tratamiento) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tratamientos.destroy', $tratamiento->ID_Tratamiento) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar tratamiento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
