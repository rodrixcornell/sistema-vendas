<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'descricao', 'estoque', 'preco', 'fabricante_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s',
    ];

    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }
}
