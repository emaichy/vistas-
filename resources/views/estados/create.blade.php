@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($estado) ? 'Editar Estado' : 'Agregar Estado' }}</h2>

    <form action="{{ isset($estado) ? route('estados.update', $estado->ID_Estado) : route('estados.store') }}" method="POST">
        @csrf
        @if(isset($estado))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nombre del Estado</label>
            <input type="text" name="NombreEstado" class="form-control" value="{{ old('NombreEstado', $estado->NombreEstado ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="Status" class="form-control">
                <option value="1" {{ (old('Status', $estado->Status ?? '') == 1) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ (old('Status', $estado->Status ?? '') == 0) ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
