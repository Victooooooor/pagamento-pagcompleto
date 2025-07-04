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
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->text('nome');
        $table->string('cpf_cnpj', 50);
        $table->text('email');
        $table->string('tipo_pessoa', 1);
        $table->date('data_nasc');
        $table->unsignedInteger('id_loja');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
