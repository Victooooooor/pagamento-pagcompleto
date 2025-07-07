<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
           
            $lojaId = DB::table('lojas')->insertGetId([
                'nome' => 'Loja Teste',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            
            $situacaoId = DB::table('pedido_situacao')->insertGetId([
                'descricao' => 'Aguardando Pagamento',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

           
            $cliente = Cliente::create([
                'nome' => 'Renato Ryan Lopes',
                'email' => 'renato_ryan@ecompleto.com.br',
                'cpf_cnpj' => '78891957615',
                'tipo_pessoa' => 'F',
                'data_nasc' => '1947-02-08',
            ]);

            
            $pedido = Pedido::create([
                'valor_total' => 108.00,
                'valor_frete' => 0,
                'data' => Carbon::now(),
                'id_cliente' => $cliente->id,
                'id_loja' => $lojaId,
                'id_situacao' => $situacaoId,
            ]);

            $this->command->info("Pedido criado com sucesso! ID: {$pedido->id}");
        });
    }
}
