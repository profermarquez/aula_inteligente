
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Agregar Materia</h1>

    <form action="{{ route('materias.store') }}" method="POST" class="card p-4">
        @csrf
        @include('materias.partials.form', ['materia' => new \App\Models\Materia])
    </form>
</div>
@endsection