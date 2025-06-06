@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($municipio) ? 'Editar Municipio' : 'Agregar Municipio' }}</h2>

    <form action="{{ isset($municipio) ? route('municipios.update', $municipio->ID_Municipio) : route('municipios.store') }}" method="POST">
        @csrf
        @if(isset($municipio))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nombre del Municipio</label>
            <input type="text" name="NombreMunicipio" class="form-control" value="{{ old('NombreMunicipio', $municipio->NombreMunicipio ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="ID_Estado" class="form-control" required>
                <option value="">Seleccione un estado</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado->ID_Estado }}"
                        {{ (old('ID_Estado', $municipio->ID_Estado ?? '') == $estado->ID_Estado) ? 'selected' : '' }}>
                        {{ $estado->NombreEstado }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="Status" class="form-control">
                <option value="1" {{ (old('Status', $municipio->Status ?? '') == 1) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ (old('Status', $municipio->Status ?? '') == 0) ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
