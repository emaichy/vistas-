@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Asignaciones de Pacientes a Alumnos</h2>
    <a href="{{ route('asignaciones.create') }}" class="btn btn-primary mb-3">+ Nueva Asignación</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Regresar</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

            <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Paciente</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->ID_Asignacion }}</td>
                    <td>{{ $asignacion->alumno->Nombre ?? 'N/A' }}</td>
                    <td>{{ $asignacion->paciente->Nombre ?? 'N/A' }}</td>
                    <td>{{ $asignacion->Status == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('asignaciones.edit', $asignacion->ID_Asignacion) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('asignaciones.destroy', $asignacion->ID_Asignacion) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
