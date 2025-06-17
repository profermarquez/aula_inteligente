@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Agregar Docente</h1>

    <form action="{{ route('docentes.store') }}" method="POST" class="card p-4">
        @csrf
        @include('docentes.partials.form', ['docente' => new \App\Models\Docente])
    </form>
</div>
@endsection