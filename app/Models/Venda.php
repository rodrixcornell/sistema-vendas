<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'forma_pagamento', 'observacao', 'desconto', 'acrescimo', 'total', 'cliente_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s',
    ];

    const DINHEIRO = 0;
    const CARTAO = 1;

    const FORMA_PAGAMENTO = [
        self::DINHEIRO => 'Dinheiro',
        self::CARTAO => 'Cartão',
    ];
}
