<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagamentoController extends Controller
{
    public function processar(Request $request)
    {
        $dados = $request->validate([
            'pedido_id' => 'required|string|unique:pedidos,pedido_id',
            'valor' => 'required|numeric',
            'forma_pagamento' => 'required|string',
            'cliente' => 'required|array',
        ]);

        // Cria o pedido no banco
        $pedido = Pedido::create($dados);

        // Monta a URL com o token
        $accessToken = env('PAGCOMPLETO_ACCESS_TOKEN');
        $url = "https://apiinterna.ecompleto.com.br/exams/processTransaction?accessToken={$accessToken}";

        // Envia a requisição para o gateway
        $resposta = Http::post($url, $dados);

        // Atualiza status e resposta
        $pedido->update([
            'status_pagamento' => $resposta->status() === 200 ? 'aprovado' : 'recusado',
            'resposta_gateway' => $resposta->json(),
        ]);

        return response()->json([
            'mensagem' => 'Pedido processado com sucesso',
            'pedido' => $pedido
        ]);
    }
}
