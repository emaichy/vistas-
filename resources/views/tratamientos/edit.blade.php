@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Tratamiento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('tratamientos.update', $tratamiento->ID_Tratamiento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="NombreTratamiento" class="form-control" required maxlength="100" value="{{ old('NombreTratamiento', $tratamiento->NombreTratamiento) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="Descripcion" class="form-control">{{ old('Descripcion', $tratamiento->Descripcion) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="Status" class="form-control">
                <option value="1" {{ $tratamiento->Status == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $tratamiento->Status == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
