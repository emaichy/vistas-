@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles de la Asignación</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID Asignación:</strong> {{ $asignacion->ID_Asignacion }}</p>
            <p><strong>Alumno:</strong> {{ $asignacion->alumno->Nombre }} {{ $asignacion->alumno->ApePaterno }}</p>
            <p><strong>Paciente:</strong> {{ $asignacion->paciente->Nombre ?? 'N/A' }}</p>
            <p><strong>Status:</strong> {{ $asignacion->Status }}</p>
            <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
