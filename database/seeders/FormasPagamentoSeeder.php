<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormasPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            DB::table('formas_pagamento')->insert([
            ['id' => 1, 'descricao' => 'Boleto Bancário'],
            ['id' => 2, 'descricao' => 'Depósito Bancário'],
            ['id' => 3, 'descricao' => 'Cartão de Crédito'],
        ]);
    }
}
