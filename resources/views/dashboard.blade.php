@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Panel Principal</h2>
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('alumnos.index') }}" class="btn btn-outline-primary w-100">Alumnos</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('maestros.index') }}" class="btn btn-outline-primary w-100">Maestros</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('pacientes.index') }}" class="btn btn-outline-primary w-100">Pacientes</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('grupos.index') }}" class="btn btn-outline-primary w-100">Grupos</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('semestres.index') }}" class="btn btn-outline-primary w-100">Semestres</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('asignaciones.index') }}" class="btn btn-outline-primary w-100">Asignaciones</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('expedientes.index') }}" class="btn btn-outline-primary w-100">Expedientes</a>
        </div>
    </div>
</div>
@endsection
