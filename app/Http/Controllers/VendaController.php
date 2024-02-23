<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Produto;

class VendaController extends Controller
{
    
    public function index()
    {
        $vendas = Venda::all();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $formasPagamento = FormaPagamento::all();
        $produtos = Produto::all();
        return view('vendas.create', compact('clientes', 'formasPagamento', 'produtos'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id',
            'valor_total' => 'required|numeric|min:0',
            'parcelado' => 'required|boolean',
            'quantidade_parcelas' => $request->parcelado ? 'required|integer|min:1' : '',
            'data_vencimento' => $request->parcelado ? 'required|date' : '',
            'valor_primeira_parcela' => $request->parcelado ? 'required|numeric|min:0' : '',
        ]);
        
        

        $venda = Venda::create($request->all());

        return redirect()->route('vendas.show', $venda->id)
            ->with('success', 'Venda criada com sucesso.');
    }

    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

 
    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        $formasPagamento = FormaPagamento::all();
        $produtos = Produto::all();
        return view('vendas.edit', compact('venda', 'clientes', 'formasPagamento', 'produtos'));
    }

 
    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'forma_pagamento_id' => 'required|exists:formas_pagamento,id',
            'valor_total' => 'required|numeric|min:0',
        ]);
        
        $venda->update($request->all());

        return redirect()->route('vendas.show', $venda->id)
            ->with('success', 'Venda atualizada com sucesso.');
    }



    public function destroy(Venda $venda)
    {
        $venda->delete();

        return redirect()->route('vendas.index')
            ->with('success', 'Venda excluída com sucesso.');
    }
}
