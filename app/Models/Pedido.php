<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'pedido_id',
        'valor',
        'forma_pagamento',
        'cliente',
        'status_pagamento',
        'resposta_gateway'
    ];

    protected $casts = [
        'cliente' => 'array',
        'resposta_gateway' => 'array',
    ];
}
