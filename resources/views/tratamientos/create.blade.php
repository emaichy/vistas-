@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Tratamiento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('tratamientos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="NombreTratamiento" class="form-control" required maxlength="100" value="{{ old('NombreTratamiento') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="Descripcion" class="form-control">{{ old('Descripcion') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="Status" class="form-control">
                <option value="1" selected>Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
