<?php

namespace App\Services;

use App\Models\Produto;
use Throwable;
use Illuminate\Support\Facades\Log;

class ProdutoService
{
    public static function store(array $request)
    {
        try {
            return Produto::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update(array $request, Produto $produto)
    {
        try {
            return $produto->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy(Produto $produto)
    {
        try {
            return $produto->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function ProdutosSelect($request)
    {
        if (isset($request['pesquisa'])) {
            return Produto::select('id', 'nome as text')
                            ->where('nome', 'like', "%" . $request['pesquisa'] . "%")
                            ->limit(10)
                            ->get();
        }

        return Produto::select('id', 'nome as text')
                        ->limit(10)
                        ->get();
    }
}
