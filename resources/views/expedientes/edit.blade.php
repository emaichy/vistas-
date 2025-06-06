@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Editar Expediente</h2>
    <form action="{{ route('expedientes.update', $expediente->ID_Expediente) }}" method="POST">
        @csrf
        @method('PUT')
        @include('expedientes.form', ['expediente' => $expediente])
        <button class="btn btn-success mt-3">Actualizar</button>
        <a href="{{ route('expedientes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
