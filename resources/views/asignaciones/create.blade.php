@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nueva Asignación</h2>
    <form action="{{ route('asignaciones.store') }}" method="POST">
        @csrf
        @include('asignaciones._form')
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
