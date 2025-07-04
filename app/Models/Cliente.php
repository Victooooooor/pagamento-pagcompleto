<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'cpf_cnpj', 'email', 'tipo_pessoa', 'data_nasc', 'id_loja'
    ];

    protected $dates = ['data_nasc'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }
}
