<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->decimal('valor_total', 12, 2);
            $table->decimal('valor_frete', 12, 2);
            $table->timestamp('data');

            
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');

            
            $table->foreignId('id_loja')->constrained('lojas')->onDelete('cascade');

            
            $table->foreignId('id_situacao')->constrained('pedido_situacao')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
