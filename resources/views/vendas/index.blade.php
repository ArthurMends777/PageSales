@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listagem de Vendas</h1>
        <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">Nova Venda</a>

        @if($vendas->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendas as $venda)
                        <tr>
                            <td>{{ $venda->id }}</td>
                            <td>{{ $venda->cliente->nome ?? 'Anônimo' }}</td>
                            <td>{{ $venda->produto->nome }}</td>
                            <td>{{ $venda->quantidade }}</td>
                            <td>{{ $venda->valor_total }}</td>
                            <td>
                                <a href="{{ route('vendas.show', $venda->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                                <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta venda?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                Não há vendas cadastradas.
            </div>
        @endif
    </div>
@endsection
