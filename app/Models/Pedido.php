<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'valor_total', 'valor_frete', 'data', 'id_cliente', 'id_loja', 'id_situacao'
    ];

    protected $casts = [
    'data' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function situacao()
    {
        return $this->belongsTo(PedidoSituacao::class, 'id_situacao');
    }

    public function pagamento()
    {
        return $this->hasOne(PedidoPagamento::class, 'id_pedido');
    }
}
