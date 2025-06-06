@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Asignación</h2>
    <form action="{{ route('asignaciones.update', $asignacion->ID_Asignacion) }}" method="POST">
        @csrf
        @method('PUT')
        @include('asignaciones._form', ['asignacion' => $asignacion])
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
