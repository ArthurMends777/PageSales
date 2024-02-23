@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Cliente</h1>
        <div class="card">
            <div class="card-header">
                <h5>{{ $cliente->nome }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
                <p><strong>Email:</strong> {{ $cliente->email }}</p>
            </div>
        </div>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
