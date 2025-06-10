@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Panel Principal Admininistrativo</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

        @php
            $modulos = [
                ['nombre' => 'Alumnos', 'ruta' => 'alumnos.index', 'icono' => 'fas fa-user-graduate'],
                ['nombre' => 'Maestros', 'ruta' => 'maestros.index', 'icono' => 'fas fa-chalkboard-teacher'],
                ['nombre' => 'Pacientes', 'ruta' => 'pacientes.index', 'icono' => 'fas fa-user-injured'],
                ['nombre' => 'Grupos', 'ruta' => 'grupos.index', 'icono' => 'fas fa-users'],
                ['nombre' => 'Semestres', 'ruta' => 'semestres.index', 'icono' => 'fas fa-calendar-alt'],
                ['nombre' => 'Asignaciones', 'ruta' => 'asignaciones.index', 'icono' => 'fas fa-tasks'],
                ['nombre' => 'Expedientes', 'ruta' => 'expedientes.index', 'icono' => 'fas fa-folder-open'],
                ['nombre' => 'Usuarios', 'ruta' => 'usuarios.index', 'icono' => 'fas fa-user-cog'],
                ['nombre' => 'Tratamientos', 'ruta' => 'tratamientos.index', 'icono' => 'fas fa-notes-medical'],
                ['nombre' => 'Documentos', 'ruta' => 'documentos.index', 'icono' => 'fas fa-documents'],
                 ['nombre' => 'Notas de Evolucion', 'ruta' => 'notasevolucion.index', 'icono' => 'fas fa-tasks'],
            ];
        @endphp

        @foreach ($modulos as $modulo)
        <div class="col">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="{{ $modulo['icono'] }} fa-2x text-primary mb-3"></i>
                    <h5 class="card-title">{{ $modulo['nombre'] }}</h5>
                    <a href="{{ route($modulo['ruta']) }}" class="btn btn-outline-primary w-100">Ir a {{ $modulo['nombre'] }}</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

