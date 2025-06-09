@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2>Detalle del Documento</h2>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>ID:</strong> {{ $documento->ID_DocumentoPaciente }}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{ $documento->Tipo }}</li>
        <li class="list-group-item"><strong>Paciente:</strong> {{ $documento->paciente->Nombre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $documento->Status == 1 ? 'Activo' : 'Inactivo' }}</li>
    </ul>

    @if($documento->RutaArchivo)
        <div class="mb-3">
            <strong>Archivo Subido:</strong>
            <br>
            @php
       
            $extension = pathinfo($documento->RutaArchivo, PATHINFO_EXTENSION);
            @endphp

@if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
    <img src="{{ Storage::url($documento->RutaArchivo) }}" alt="Documento" class="img-fluid">
@elseif($extension === 'pdf')
    <embed src="{{ Storage::url($documento->RutaArchivo) }}" type="application/pdf" width="100%" height="600px"/>
@else
    <a href="{{ Storage::url($documento->RutaArchivo) }}" target="_blank" class="btn btn-outline-primary">Ver documento</a>
@endif

        </div>
    @else
        <div class="alert alert-warning">No hay documento adjunto.</div>
    @endif

    <a href="{{ route('documentos.index') }}" class="btn btn-secondary mt-3">Regresar</a>
</div>
@endsection
