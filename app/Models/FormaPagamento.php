<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected $table = 'formas_pagamento';
    protected $fillable = ['nome'];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}