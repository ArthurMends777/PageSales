@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Venda #{{ $venda->id }}</h1>
    <p><strong>Cliente:</strong> {{ $venda->cliente->nome ?? 'Anônimo' }}</p>
    <p><strong>Produto:</strong> {{ $venda->produto->nome }}</p>
    <p><strong>Quantidade:</strong> {{ $venda->quantidade }}</p>
    <p><strong>Valor Total:</strong> {{ $venda->valor_total }}</p>
    <p><strong>Forma de Pagamento:</strong> {{ $venda->formaPagamento->nome }}</p>

    <div class="btn-group">
        <a href="{{ route('vendas.index') }}" class="btn btn-primary">Voltar para Lista</a>
        <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta venda?')">
                Excluir
            </button>
        </form>
    </div>
</div>
@endsection
