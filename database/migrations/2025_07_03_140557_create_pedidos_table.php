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
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->string('pedido_id')->unique();
        $table->decimal('valor', 10, 2);
        $table->string('forma_pagamento');
        $table->json('cliente');
        $table->string('status_pagamento')->nullable(); // aprovado, recusado, etc.
        $table->json('resposta_gateway')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
