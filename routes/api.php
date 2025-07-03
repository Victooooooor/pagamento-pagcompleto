<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagamentoController;


Route::post('/pagamento', [PagamentoController::class, 'processar']);
