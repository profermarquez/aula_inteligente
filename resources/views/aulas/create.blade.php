@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Agregar Aula</h1>
    <form action="{{ route('aulas.store') }}" method="POST" class="card p-4">
        @csrf
        @include('aulas.partials.form', ['aula' => new \App\Models\Aula])
    </form>
</div>
@endsection