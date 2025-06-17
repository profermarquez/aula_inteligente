@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Editar Materia</h1>

    <form action="{{ route('materias.update', $materia) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        @include('materias.partials.form', ['materia' => $materia])
    </form>
</div>
@endsection