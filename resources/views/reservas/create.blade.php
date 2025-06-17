@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Crear Reserva</h1>
    <form action="{{ route('reservas.store') }}" method="POST" class="card p-4">
        @csrf
        @include('reservas.partials.form', ['reserva' => new \App\Models\Reserva])
    </form>
</div>
@endsection