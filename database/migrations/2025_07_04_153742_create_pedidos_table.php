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
        $table->decimal('valor_total', 12, 2);
        $table->decimal('valor_frete', 12, 2);
        $table->timestamp('data');
        $table->unsignedInteger('id_cliente');
        $table->unsignedInteger('id_loja');
        $table->unsignedInteger('id_situacao');
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
