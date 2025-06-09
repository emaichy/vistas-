@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Documento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('documentos.update', $documento->ID_DocumentoPaciente) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="Tipo" class="form-control" required>
                <option value="INE" {{ $documento->Tipo === 'INE' ? 'selected' : '' }}>INE</option>
                <option value="ComprobanteDomicilio" {{ $documento->Tipo === 'ComprobanteDomicilio' ? 'selected' : '' }}>Comprobante de Domicilio</option>
                <option value="CURP" {{ $documento->Tipo === 'CURP' ? 'selected' : '' }}>CURP</option>
                <option value="Otro" {{ $documento->Tipo === 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Paciente</label>
            <select name="ID_Paciente" class="form-control" required>
                <option value="">Selecciona un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->ID_Paciente }}" {{ $documento->ID_Paciente == $paciente->ID_Paciente ? 'selected' : '' }}>
                        {{ $paciente->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Archivo (opcional)</label>
            <input type="file" name="RutaArchivo" class="form-control">
            @if($documento->RutaArchivo)
                <small class="form-text text-muted">Archivo actual: 
                    <a href="{{ Storage::url($documento->RutaArchivo) }}" target="_blank">Ver documento</a>
                </small>
            @endif
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
