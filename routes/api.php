<?php

use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;

Route::post('/pagamento', [PagamentoController::class, 'processar']);
