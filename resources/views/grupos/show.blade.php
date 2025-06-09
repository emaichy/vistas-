@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Grupo</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $grupo->ID_Grupo }}</li>
        <li class="list-group-item"><strong>Nombre del Grupo:</strong> {{ $grupo->NombreGrupo }}</li>
        <li class="list-group-item">
    <strong>Maestro:</strong>
    {{ $grupo->maestro ? $grupo->maestro->Nombre . ' ' . $grupo->maestro->ApePaterno . ' ' . $grupo->maestro->ApeMaterno : 'N/A' }}
</li>

        <li class="list-group-item"><strong>Semestre:</strong> {{ $grupo->semestre->Semestre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $grupo->Status == 1 ? 'Activo' : 'Inactivo' }}</li>
    </ul>
    <a href="{{ route('grupos.index') }}" class="btn btn-primary mt-3">Regresar</a>
</div>
@endsection
