@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Nuevo Expediente</h2>
    <form action="{{ route('expedientes.store') }}" method="POST">
        @csrf
        @include('expedientes.form')
        <button class="btn btn-success mt-3">Guardar</button>
        <a href="{{ route('expedientes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
