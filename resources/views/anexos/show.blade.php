@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Anexo</h2>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>ID:</strong> {{ $anexo->ID_AnexoExpediente }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $anexo->Nombre_Anexo }}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{ $anexo->Tipo_Anexo }}</li>
        <li class="list-group-item"><strong>Expediente ID:</strong> {{ $anexo->ID_Expediente }}</li>
    </ul>

    @if($anexo->Ruta_Anexo)
        <div>
            <strong>Archivo:</strong><br>
            <a href="{{ Storage::url($anexo->Ruta_Anexo) }}" target="_blank">Ver Anexo</a>
        </div>
    @else
        <div class="alert alert-warning">No hay archivo disponible.</div>
    @endif

    <a href="{{ route('anexos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
