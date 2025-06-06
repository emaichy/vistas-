@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Grupo</h2>
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        @include('grupos.form')
        <div class="text-end mt-3">
            <button class="btn btn-success">Guardar</button>
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
