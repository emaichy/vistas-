@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Paciente</h2>

    <form action="{{ route('pacientes.update', $paciente->ID_Paciente) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('pacientes.form', ['paciente' => $paciente, 'estados' => $estados, 'municipios' => $municipios])

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
