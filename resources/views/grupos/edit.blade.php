@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Grupo</h2>
    <form action="{{ route('grupos.update', $grupo->ID_Grupo) }}" method="POST">
        @csrf
        @method('PUT')
        @include('grupos.form', ['grupo' => $grupo])
        <div class="text-end mt-3">
            <button class="btn btn-success">Actualizar</button>
            <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
