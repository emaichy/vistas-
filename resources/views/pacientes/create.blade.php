@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Registrar Paciente</h2>

    <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Nombre</label>
                <input type="text" name="Nombre" class="form-control" required maxlength="80">
            </div>
            <div class="col-md-4 mb-3">
                <label>Apellido Paterno</label>
                <input type="text" name="ApePaterno" class="form-control" required maxlength="50">
            </div>
            <div class="col-md-4 mb-3">
                <label>Apellido Materno</label>
                <input type="text" name="ApeMaterno" class="form-control" required maxlength="50">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="FechaNac" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Sexo</label>
                <select name="Sexo" class="form-control">
                    <option value="">Selecciona</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Tipo de Paciente</label>
                <input type="text" name="TipoPaciente" class="form-control" required maxlength="15">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Dirección</label>
                <input type="text" name="Direccion" class="form-control" maxlength="100">
            </div>
            <div class="col-md-3 mb-3">
                <label>Número Exterior</label>
                <input type="text" name="NumeroExterior" class="form-control" maxlength="10">
            </div>
            <div class="col-md-3 mb-3">
                <label>Número Interior</label>
                <input type="text" name="NumeroInterior" class="form-control" maxlength="10">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Código Postal</label>
                <input type="text" name="CodigoPostal" class="form-control" maxlength="10">
            </div>
            <div class="col-md-4 mb-3">
                <label>País</label>
                <input type="text" name="Pais" class="form-control" required maxlength="100">
            </div>
            <div class="col-md-4 mb-3">
                <label>Foto del Paciente</label>
                <input type="file" name="Foto_Paciente" class="form-control" accept="image/*">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Estado</label>
             <select name="ID_Estado" class="form-control" required>
    <option value="">Selecciona un estado</option>
    @foreach($estados as $estado)
        <option value="{{ $estado->ID_Estado }}">{{ $estado->NombreEstado }}</option>
    @endforeach
</select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Municipio</label>
              <select name="ID_Municipio" class="form-control" required>
    <option value="">Selecciona un municipio</option>
    @foreach($municipios as $municipio)
        <option value="{{ $municipio->ID_Municipio }}">{{ $municipio->NombreMunicipio }}</option>
    @endforeach
</select>
            </div>
        </div>

        <input type="hidden" name="Status" value="1">

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
