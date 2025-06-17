@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Crear Horario</h1>
    <form action="{{ route('horarios.store') }}" method="POST" class="card p-4">
        @csrf
        @include('horarios.partials.form', ['horario' => new \App\Models\Horario])
    </form>
</div>
@endsection