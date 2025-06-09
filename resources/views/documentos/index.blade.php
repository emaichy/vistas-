@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Documentos de Pacientes</h2>
    <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">+ Nuevo Documento</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Tipo</th>
                <th>Archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{ $documento->ID_DocumentoPaciente }}</td>
                   <td>
    {{ $documento->paciente->Nombre ?? '' }}
    {{ $documento->paciente->ApePaterno ?? '' }}
    {{ $documento->paciente->ApeMaterno ?? '' }}
</td>

                    <td>{{ $documento->Tipo }}</td>
                    <td>

         
                        @if($documento->RutaArchivo)
                            <a href="{{ Storage::url($documento->RutaArchivo) }}" target="_blank">Ver Documento</a>
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('documentos.show', $documento->ID_DocumentoPaciente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('documentos.edit', $documento->ID_DocumentoPaciente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('documentos.destroy', $documento->ID_DocumentoPaciente) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
