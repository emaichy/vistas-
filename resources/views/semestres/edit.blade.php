@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Semestre</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('semestres.update', $semestre->ID_Semestre) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Semestre" class="form-label">Semestre</label>
            <input type="text" name="Semestre" class="form-control" id="Semestre" value="{{ old('Semestre', $semestre->Semestre) }}" required>
        </div>
        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" id="Status" class="form-control" required>
                <option value="1" {{ old('Status', $semestre->Status) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('Status', $semestre->Status) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('semestres.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
