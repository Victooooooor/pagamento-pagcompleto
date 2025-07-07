<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PagamentoController extends Controller
{
    public function processarPagamento(Request $request)
    {
        try {
            $request->validate([
                'id_pedido' => 'required|integer|exists:pedidos,id',
                'num_cartao' => 'required|string',
                'codigo_verificacao' => 'required|string',
                'vencimento' => 'required|string',
                'nome_portador' => 'required|string',
            ]);

            $pedido = Pedido::with('cliente')->findOrFail($request->id_pedido);

            $token = config('services.pagcompleto.token');

            $url = "https://apiinterna.ecompleto.com.br/exams/processTransaction?accessToken={$token}";

            $payload = [
                'external_order_id' => $pedido->id,
                'amount' => number_format($pedido->valor_total, 2, '.', ''),
                'card_number' => $request->num_cartao,
                'card_cvv' => $request->codigo_verificacao,
                'card_expiration_date' => $request->vencimento,
                'card_holder_name' => $request->nome_portador,
                'customer' => [
                    'external_id' => (string) $pedido->cliente->id,
                    'name' => $pedido->cliente->nome,
                    'type' => $pedido->cliente->tipo_pessoa === 'F' ? 'individual' : 'corporate',
                    'email' => $pedido->cliente->email,
                    'documents' => [
                        [
                            'type' => 'cpf',
                            'number' => $pedido->cliente->cpf_cnpj,
                        ]
                    ],
                    'birthday' => Carbon::parse($pedido->cliente->data_nasc)->format('Y-m-d'),
                ],
            ];

            
             Log::info('Payload enviado', $payload);
             dd(json_encode($payload));

            $response = Http::post($url, $payload);

            if ($response->successful()) {
                $json = $response->json();

                if (!$json['Error']) {
                    $pedido->id_situacao = 2;
                    $pedido->save();

                    return response()->json([
                        'success' => true,
                        'message' => $json['Message'],
                        'transaction_code' => $json['Transaction_code'],
                    ]);
                }

                return response()->json([
                    'success' => false,
                    'message' => $json['Message'] ?? 'Erro na transação',
                ], 422);
            }

            Log::error('Erro na comunicação com o gateway', [
                'status' => $response->status(),
                'reason' => $response->reason(),
                'body' => $response->body(),
                'url' => $url,
                'payload' => $payload,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Falha na comunicação com o gateway de pagamento',
            ], 500);

} catch (\Exception $e) {
    Log::error('Exceção ao processar pagamento', [
        'mensagem' => $e->getMessage(),
        'arquivo' => $e->getFile(),
        'linha' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);

    return response()->json([
        'success' => false,
        'message' => 'Erro interno ao processar o pagamento.',
    ], 500);
}
    }
}
