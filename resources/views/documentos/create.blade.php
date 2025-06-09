@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Documento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="Tipo" class="form-control" required>
                <option value="INE">INE</option>
                <option value="ComprobanteDomicilio">Comprobante de Domicilio</option>
                <option value="CURP">CURP</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Paciente</label>
            <select name="ID_Paciente" class="form-control" required>
                <option value="">Selecciona un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->ID_Paciente }}">{{ $paciente->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Archivo</label>
            <input type="file" name="RutaArchivo" class="form-control">
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
