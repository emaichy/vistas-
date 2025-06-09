@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nota de Evolución ID: {{ $nota->id }}</h3>

    <p><strong>Alumno:</strong> {{ $nota->alumno->Nombre }} {{ $nota->alumno->ApePaterno }} {{ $nota->alumno->ApeMaterno }}</p>
    <p><strong>Paciente:</strong> {{ $nota->paciente->Nombre }} {{ $nota->paciente->ApePaterno }} {{ $nota->paciente->ApeMaterno }}</p>
    <p><strong>Fecha:</strong> {{ $nota->fecha }}</p>
    <p><strong>Descripción:</strong><br>{{ $nota->descripcion_tratamiento }}</p>

    <hr>
    @if($nota->pdf_document)
        <a href="{{ Storage::url($nota->pdf_document) }}" target="_blank" class="btn btn-primary">Ver Documento PDF</a>
    @endif
    <a href="{{ route('notasevolucion.index') }}" class="btn btn-secondary">Regresar</a>
</div>
@endsection
