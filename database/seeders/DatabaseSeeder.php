<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        $idLoja1 = DB::table('lojas')->insertGetId([
            'nome' => 'Loja Curitiba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $idLoja2 = DB::table('lojas')->insertGetId([
            'nome' => 'Loja São Paulo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        $idSituacao1 = DB::table('pedido_situacao')->insertGetId(['descricao' => 'Aguardando pagamento', 'created_at' => now(), 'updated_at' => now()]);
        $idSituacao2 = DB::table('pedido_situacao')->insertGetId(['descricao' => 'Pago', 'created_at' => now(), 'updated_at' => now()]);
        $idSituacao3 = DB::table('pedido_situacao')->insertGetId(['descricao' => 'Cancelado', 'created_at' => now(), 'updated_at' => now()]);

        
        $clienteId = DB::table('clientes')->insertGetId([
            'nome' => 'Renato Ryan Lopes',
            'cpf_cnpj' => '78891957615',
            'email' => 'renato_ryan@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '1947-02-08',
            'id_loja' => $idLoja1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        DB::table('pedidos')->insert([
            'valor_total' => 108.00,
            'valor_frete' => 10.00,
            'data' => Carbon::now(),
            'id_cliente' => $clienteId,
            'id_loja' => $idLoja1,
            'id_situacao' => $idSituacao1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
