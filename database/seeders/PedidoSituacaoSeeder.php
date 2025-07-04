<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('pedido_situacao')->insert([
            ['id' => 1, 'descricao' => 'Aguardando Pagamento'],
            ['id' => 2, 'descricao' => 'Pagamento Identificado'],
            ['id' => 3, 'descricao' => 'Pedido Cancelado'],
        ]);
    }
}
