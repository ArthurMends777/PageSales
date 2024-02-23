@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Venda #{{ $venda->id }}</h1>
        <form action="{{ route('vendas.update', $venda->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                    <option value="">Selecione o Cliente (opcional)</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $venda->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="produto_id">Produto:</label>
                <select class="form-control" id="produto_id" name="produto_id">
                    <option value="">Selecione o Produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}" {{ $venda->produto_id == $produto->id ? 'selected' : '' }} data-preco="{{ $produto->preco }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $venda->quantidade }}">
            </div>
            <div class="form-group">
                <label for="forma_pagamento_id">Forma de Pagamento:</label>
                <select class="form-control" id="forma_pagamento_id" name="forma_pagamento_id">
                    @foreach($formasPagamento as $formaPagamento)
                        <option value="{{ $formaPagamento->id }}" {{ $venda->forma_pagamento_id == $formaPagamento->id ? 'selected' : '' }}>{{ $formaPagamento->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="valor_total">Valor Total:</label>
                <input type="text" class="form-control" id="valor_total" name="valor_total" value="{{ $venda->valor_total }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/editSale.js') }}"></script>
    
@endsection
