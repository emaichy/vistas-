@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Paciente</h2>
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $paciente->ID_Paciente }}</p>
            <p><strong>Nombre:</strong> {{ $paciente->Nombre }} {{ $paciente->ApePaterno }} {{ $paciente->ApeMaterno }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->FechaNac }}</p>
            <p><strong>Sexo:</strong> {{ $paciente->Sexo }}</p>
            <p><strong>Dirección:</strong> {{ $paciente->Direccion }} {{ $paciente->NumeroExterior }}/{{ $paciente->NumeroInterior }}</p>
            <p><strong>Código Postal:</strong> {{ $paciente->CodigoPostal }}</p>
            <p><strong>Estado:</strong> {{ $paciente->estado->NombreEstado ?? 'N/A' }}</p>
            <p><strong>Municipio:</strong> {{ $paciente->municipio->NombreMunicipio ?? 'N/A' }}</p>
            <p><strong>País:</strong> {{ $paciente->Pais }}</p>
            <p><strong>Tipo de Paciente:</strong> {{ $paciente->TipoPaciente }}</p>
            <p><strong>Foto:</strong><br>
                @if($paciente->Foto_Paciente)
                    <img src="{{ asset('storage/' . $paciente->Foto_Paciente) }}" alt="Foto" width="150">
                @else
                    Sin foto
                @endif
            </p>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-3">Regresar al listado</a>
        </div>
    </div>
</div>
@endsection
