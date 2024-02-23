<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('produto_id');
            $table->integer('quantidade');
            $table->boolean('parcelado')->default(false);
            $table->integer('quantidade_parcelas')->nullable();
            $table->decimal('valor_total', 8, 2);
            $table->unsignedBigInteger('forma_pagamento_id');
            $table->timestamps();
        
           
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade'); 
            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamento');
        });
            
             
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
