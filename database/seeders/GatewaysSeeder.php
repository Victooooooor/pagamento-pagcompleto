<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GatewaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('gateways')->insert([
        ['id' => 1, 'descricao' => 'PAGCOMPLETO', 'endpoint' => 'https://api11.ecompleto.com.br/'],
        ['id' => 2, 'descricao' => 'CIELO', 'endpoint' => 'https://api.cielo.com.br/v1/transactions/'],
        ['id' => 3, 'descricao' => 'PAGSEGURO', 'endpoint' => 'https://api.pagseguro.com.br/transactions/'],
    ]);
    }
}
