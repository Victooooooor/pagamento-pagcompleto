<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoSituacao extends Model
{
    protected $fillable = ['descricao'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_situacao');
    }
}
