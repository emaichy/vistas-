@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Grupos</h2>
    <a href="{{ route('grupos.create') }}" class="btn btn-primary mb-3">+ Nuevo Grupo</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Regresar</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Maestro</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
            <tr>
                <td>{{ $grupo->ID_Grupo }}</td>
                <td>{{ $grupo->NombreGrupo }}</td>
                <td>{{ $grupo->maestro ? $grupo->maestro->Nombre . ' ' . $grupo->maestro->ApePaterno . ' ' . $grupo->maestro->ApeMaterno : 'N/A' }}</td>
                <td>{{ $grupo->semestre->Semestre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('grupos.show', $grupo->ID_Grupo) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('grupos.edit', $grupo->ID_Grupo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('grupos.destroy', $grupo->ID_Grupo) }}" method="POST" style="display:inline-block;">
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
