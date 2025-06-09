@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Tratamiento</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $tratamiento->ID_Tratamiento }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $tratamiento->NombreTratamiento }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $tratamiento->Descripcion }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $tratamiento->Status == 1 ? 'Activo' : 'Inactivo' }}</li>
    </ul>
    <a href="{{ route('tratamientos.index') }}" class="btn btn-primary mt-3">Regresar</a>
</div>
@endsection
