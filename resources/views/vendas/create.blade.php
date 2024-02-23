@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Venda</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vendas.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="cliente_id">Cliente</label>
                            <select class="form-control" id="cliente_id" name="cliente_id">
                                <option value="">Selecione um cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="produto_id">Produto</label>
                            <select class="form-control" id="produto_id" name="produto_id" required>
                                <option value="">Selecione um produto</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}">{{ $produto->nome }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('produto_id') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required>
                            <small class="text-danger">{{ $errors->first('quantidade') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="forma_pagamento_id">Forma de Pagamento</label>
                            <select class="form-control" id="forma_pagamento_id" name="forma_pagamento_id" required>
                                <option value="">Selecione uma forma de pagamento</option>
                                @foreach($formasPagamento as $formaPagamento)
                                    <option value="{{ $formaPagamento->id }}">{{ $formaPagamento->nome }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('forma_pagamento_id') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="valor_total">Valor Total</label>
                            <input type="text" class="form-control" id="valor_total" name="valor_total" value="{{ old('valor_total') }}" readonly required>
                            <small class="text-danger">{{ $errors->first('valor_total') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="parcelado">Parcelado?</label>
                            <select class="form-control" id="parcelado" name="parcelado">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        
                        <div class="form-group" id="dados_parcelamento" style="display: none;">
                            <div id="quantidade_parcelas_div">
                                <label for="quantidade_parcelas">Quantidade de Parcelas</label>
                                <input type="number" class="form-control" id="quantidade_parcelas" name="quantidade_parcelas" value="{{ old('quantidade_parcelas') }}">
                                <small class="text-danger">{{ $errors->first('quantidade_parcelas') }}</small>
                            </div>
                            <div id="data_vencimento_div">
                                <label for="data_vencimento">Data de Vencimento da Primeira Parcela</label>
                                <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="{{ old('data_vencimento') }}">
                                <small class="text-danger">{{ $errors->first('data_vencimento') }}</small>
                            </div>
                            <div id="valor_primeira_parcela_div">
                                <label for="valor_primeira_parcela">Valor da Primeira Parcela</label>
                                <input type="text" class="form-control" id="valor_primeira_parcela" name="valor_primeira_parcela" value="{{ old('valor_primeira_parcela') }}">
                                <small class="text-danger">{{ $errors->first('valor_primeira_parcela') }}</small>
                            </div>
                            <div id="valor_parcelas_div" style="display: none;">
                                <label>Valor de Cada Parcela</label>
                                <ul id="valor_parcelas" class="list-unstyled"></ul>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Criar Venda</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/createSale.js') }}"></script>
@endsection
