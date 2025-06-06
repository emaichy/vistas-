@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Municipios</h2>
    <a href="{{ route('municipios.create') }}" class="btn btn-primary mb-3">Agregar Municipio</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($municipios as $municipio)
            <tr>
                <td>{{ $municipio->ID_Municipio }}</td>
                <td>{{ $municipio->NombreMunicipio }}</td>
                <td>{{ $municipio->estado->NombreEstado }}</td>
                <td>{{ $municipio->Status }}</td>
                <td>
                    <a href="{{ route('municipios.show', $municipio->ID_Municipio) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('municipios.edit', $municipio->ID_Municipio) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('municipios.destroy', $municipio->ID_Municipio) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar municipio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
