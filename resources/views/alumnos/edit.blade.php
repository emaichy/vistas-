@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($alumno) ? 'Editar Alumno' : 'Nuevo Alumno' }}</h2>

    <form action="{{ isset($alumno) ? route('alumnos.update', $alumno->Matricula) : route('alumnos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($alumno))
            @method('PUT')
        @endif

        @include('alumnos._form')

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-success">{{ isset($alumno) ? 'Actualizar' : 'Guardar' }}</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
