<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormaPagamento;

class FormaPagamentoController extends Controller
{
    public function index()
    {
        $formasPagamento = FormaPagamento::all();
        return view('formas_pagamento.index', compact('formasPagamento'));
    }

    public function create()
    {
        return view('formas_pagamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:formas_pagamento,nome',
        ]);

        FormaPagamento::create($request->all());

        return redirect()->route('formas_pagamento.index');
    }

    public function show($id)
    {
        $formaPagamento = FormaPagamento::findOrFail($id);
        return view('formas_pagamento.show', compact('formaPagamento'));
    }

    public function edit($id)
    {
        $formaPagamento = FormaPagamento::findOrFail($id);
        return view('formas_pagamento.edit', compact('formaPagamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|unique:formas_pagamento,nome,' . $id,
        ]);

        $formaPagamento = FormaPagamento::findOrFail($id);
        $formaPagamento->update($request->all());

        return redirect()->route('formas_pagamento.index');
    }

    public function destroy($id)
    {
        $formaPagamento = FormaPagamento::findOrFail($id);
        $formaPagamento->delete();
        return redirect()->route('formas_pagamento.index');
    }
}
