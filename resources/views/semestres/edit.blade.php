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
            <input type="number" name="Status" class="form-control" id="Status" value="{{ old('Status', $semestre->Status) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('semestres.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
