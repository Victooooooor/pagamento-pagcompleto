<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagamentoController;

Route::post('/pagamentos', [PagamentoController::class, 'processarPagamento']);

Route::get('/ping', fn () => response()->json(['pong' => true]));