<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $fillable = [
        'nome', 'site',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m:s',
        'updated_at' => 'datetime:d/m/Y H:m:s',
    ];
}
