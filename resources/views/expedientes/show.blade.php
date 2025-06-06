@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Detalles del Expediente</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $expediente->ID_Expediente }}</li>
        <li class="list-group-item"><strong>Paciente:</strong> {{ $expediente->paciente->Nombre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Alumno:</strong> {{ $expediente->alumno->Nombre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{ $expediente->TipoExpediente }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $expediente->Status }}</li>
    </ul>
    <a href="{{ route('expedientes.index') }}" class="btn btn-primary mt-3">Regresar</a>
</div>
@endsection
