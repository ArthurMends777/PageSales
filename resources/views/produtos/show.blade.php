@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Produto</h1>
        <div class="card">
            <div class="card-header">
                <h5>{{ $produto->nome }}</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $produto->id }}</p>
                <p><strong>Nome:</strong> {{ $produto->nome }}</p>
                <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                <p><strong>Preço:</strong> {{ $produto->preco }}</p>
                <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
            </div>
        </div>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
