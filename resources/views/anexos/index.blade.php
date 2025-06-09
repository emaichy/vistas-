@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Anexos</h2>
    <a href="{{ route('anexos.create') }}" class="btn btn-primary mb-3">+ Nuevo Anexo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anexos as $anexo)
                <tr>
                    <td>{{ $anexo->ID_AnexoExpediente }}</td>
                    <td>{{ $anexo->Nombre_Anexo }}</td>
                    <td>{{ $anexo->Tipo_Anexo ?? '-' }}</td>
                    <td>
                        @if($anexo->Ruta_Anexo)
                            <a href="{{ Storage::url($anexo->Ruta_Anexo) }}" target="_blank">Ver Archivo</a>
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('anexos.show', $anexo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('anexos.edit', $anexo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('anexos.destroy', $anexo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar anexo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
