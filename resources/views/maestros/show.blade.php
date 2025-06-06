@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles del Maestro</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID del Maestro:</strong> {{ $maestro->ID_Maestro }}</li>
        <li class="list-group-item"><strong>Nombre Completo:</strong> {{ $maestro->Nombre }} {{ $maestro->ApePaterno }} {{ $maestro->ApeMaestro }}</li>
        <li class="list-group-item"><strong>Especialidad:</strong> {{ $maestro->Especialidad }}</li>
        <li class="list-group-item"><strong>Correo del Usuario:</strong> {{ $maestro->usuario->Correo ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ $maestro->estado->NombreEstado ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Municipio:</strong> {{ $maestro->municipio->NombreMunicipio ?? 'N/A' }}</li>
    </ul>
    <a href="{{ route('maestros.index') }}" class="btn btn-primary mt-3">Regresar</a>
</div>
@endsection
