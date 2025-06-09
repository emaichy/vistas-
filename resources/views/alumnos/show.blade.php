@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Alumno</h2>

    <div class="card">
        <div class="card-body row">
            <div class="col-md-4 text-center">
                @if($alumno->Foto_Alumno)
                    <img src="{{ asset('storage/' . $alumno->Foto_Alumno) }}" class="img-fluid rounded" style="max-width: 200px;" alt="Foto del alumno">
                @else
                    <p><strong>Sin foto</strong></p>
                @endif
            </div>

            <div class="col-md-8">
                <p><strong>Matrícula:</strong> {{ $alumno->Matricula }}</p>
                <p><strong>Nombre:</strong> {{ $alumno->Nombre }} {{ $alumno->ApePaterno }} {{ $alumno->ApeMaterno }}</p>
                <p><strong>Sexo:</strong> {{ $alumno->Sexo }}</p>
                <p><strong>Grupo:</strong> {{ $alumno->grupo->NombreGrupo ?? 'N/A' }}</p>
                <p><strong>Estado:</strong> {{ $alumno->estado->NombreEstado ?? 'N/A' }}</p>
                <p><strong>Municipio:</strong> {{ $alumno->municipio->NombreMunicipio ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
        <a href="{{ route('alumnos.edit', $alumno->Matricula) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection
