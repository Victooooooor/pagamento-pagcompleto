<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LojasGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lojas_gateway')->insert([
        ['id' => 1, 'id_loja' => 90, 'id_gateway' => 1],
        ['id' => 2, 'id_loja' => 92, 'id_gateway' => 2],
        ['id' => 3, 'id_loja' => 115, 'id_gateway' => 1],
        ['id' => 4, 'id_loja' => 98, 'id_gateway' => 1],
        ['id' => 5, 'id_loja' => 97, 'id_gateway' => 1],
        ['id' => 6, 'id_loja' => 94, 'id_gateway' => 1],
    ]);
    }
}
