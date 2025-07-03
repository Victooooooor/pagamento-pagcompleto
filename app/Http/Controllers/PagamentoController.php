<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagamentoController extends Controller
{
    private string $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VySWQiOjI2ODQsInN0b3JlSWQiOjE5NzksImlhdCI6MTc1MTM5MjgwMiwiZXhwIjoxNzUzOTg0ODAyfQ.AGQA72VMedTSDkziI4tf1CIEhBhlrAC2dqXXn_22dPk';

    public function processar(Request $request)
    {
        $payload = $request->validate([
            'pedido_id' => 'required|string',
            'valor' => 'required|numeric',
            'forma_pagamento' => 'required|string',
            'cliente' => 'required|array',
        ]);

        $url = "https://apiinterna.ecompleto.com.br/exams/processTransaction?accessToken={$this->accessToken}";

        $response = Http::post($url, $payload);

        return response()->json([
            'status' => $response->status(),
            'response' => $response->json(),
        ]);
    }
}
