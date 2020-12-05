<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'email', 'cpf', 'cep', 'logradouro', 'bairro', 'localidade',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s',
    ];
}
