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
    Schema::create('pedidos_pagamentos', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('id_pedido');
        $table->unsignedInteger('id_formapagto');
        $table->integer('qtd_parcelas')->nullable();
        $table->text('retorno_intermediador')->nullable();
        $table->string('data_processamento')->nullable();
        $table->string('num_cartao', 50)->nullable();
        $table->string('nome_portador', 50)->nullable();
        $table->integer('codigo_verificacao')->nullable();
        $table->string('vencimento', 10)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_pagamentos');
    }
};
