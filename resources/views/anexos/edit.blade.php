@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Anexo</h2>
    @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif

    <form action="{{ route('anexos.store') }}" method="POST" enctype="multipart/form-data">
        @include('anexos.form')
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('anexos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
