@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Crear Cortina</h1>
    <form action="{{ route('cortinas.store') }}" method="POST" class="card p-4">
        @csrf
        @include('cortinas.partials.form', ['cortina' => new \App\Models\Cortina])
    </form>
</div>
@endsection