<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FormaPagamentoController;

Route::get('/', function () {
    return redirect()->route('vendas.index');
});
Route::resource('vendas', VendaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('formas-pagamento', FormaPagamentoController::class);




