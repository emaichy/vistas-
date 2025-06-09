@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Estados</h2>
    <a href="{{ route('estados.create') }}" class="btn btn-primary mb-3">+ Agregar Estado</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Regresar</a>

    <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estados as $estado)
            <tr>
                <td>{{ $estado->ID_Estado }}</td>
                <td>{{ $estado->NombreEstado }}</td>
                <td>{{ $estado->Status== 1 ? 'Activo' : 'Inactivo'}}</td>
                <td>
                    <a href="{{ route('estados.show', $estado->ID_Estado) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('estados.edit', $estado->ID_Estado) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('estados.destroy', $estado->ID_Estado) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
