@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Editar Docente</h1>

    <form action="{{ route('docentes.update', $docente) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        @include('docentes.partials.form', ['docente' => $docente])
    </form>
</div>
@endsection