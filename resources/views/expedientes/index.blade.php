@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Lista de Expedientes</h2>
    <a href="{{ route('expedientes.create') }}" class="btn btn-primary mb-3">Nuevo Expediente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Alumno</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expedientes as $exp)
                <tr>
                    <td>{{ $exp->ID_Expediente }}</td>
                    <td>{{ $exp->paciente->Nombre ?? 'N/A' }}</td>
                    <td>{{ $exp->alumno->Nombre ?? 'N/A' }}</td>
                    <td>{{ $exp->TipoExpediente }}</td>
                    <td>{{ $exp->Status }}</td>
                    <td>
                        <a href="{{ route('expedientes.show', $exp->ID_Expediente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('expedientes.edit', $exp->ID_Expediente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('expedientes.destroy', $exp->ID_Expediente) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar expediente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
