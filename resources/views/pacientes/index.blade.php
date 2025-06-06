@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Pacientes</h2>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">+ Nuevo Paciente</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($pacientes->isEmpty())
        <div class="alert alert-info">No hay pacientes registrados aún.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Fecha Nac.</th>
                    <th>Sexo</th>
                    <th>Dirección</th>
                    <th>CP</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>País</th>
                    <th>Tipo</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->ID_Paciente }}</td>
                    <td>{{ $paciente->Nombre }} {{ $paciente->ApePaterno }} {{ $paciente->ApeMaterno }}</td>
                    <td>{{ $paciente->FechaNac }}</td>
                    <td>{{ $paciente->Sexo }}</td>
                    <td>{{ $paciente->Direccion }} {{ $paciente->NumeroExterior }}/{{ $paciente->NumeroInterior }}</td>
                    <td>{{ $paciente->CodigoPostal }}</td>
                    <td>{{ $paciente->estado->NombreEstado ?? 'N/A' }}</td>
                    <td>{{ $paciente->municipio->NombreMunicipio ?? 'N/A' }}</td>
                    <td>{{ $paciente->Pais }}</td>
                    <td>{{ $paciente->TipoPaciente }}</td>
                    <td>
                        @if($paciente->Foto_Paciente)
                            <img src="{{ asset('storage/' . $paciente->Foto_Paciente) }}" alt="Foto" width="50" height="50">
                        @else
                            Sin foto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pacientes.edit', $paciente->ID_Paciente) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->ID_Paciente) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este paciente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
