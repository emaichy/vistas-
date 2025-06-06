@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Listado de Alumnos</h2>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">+ Nuevo Alumno</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Grupo</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->Matricula }}</td>
                    <td>{{ $alumno->Nombre }} {{ $alumno->ApePaterno }} {{ $alumno->ApeMaterno }}</td>
                    <td>{{ $alumno->Sexo }}</td>
                    <td>{{ $alumno->grupo->NombreGrupo ?? 'N/A' }}</td>
                    <td>{{ $alumno->estado->NombreEstado ?? 'N/A' }}</td>
                    <td>{{ $alumno->municipio->NombreMunicipio ?? 'N/A' }}</td>
                    <td>
                        @if($alumno->Foto_Alumno)
                            <img src="{{ asset('storage/' . $alumno->Foto_Alumno) }}" width="50" height="50" alt="Foto">
                        @else
                            Sin foto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('alumnos.edit', $alumno->Matricula) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno->Matricula) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar alumno?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
