<?php

namespace App\Services;

use App\Models\Venda;
use Throwable;
use Illuminate\Support\Facades\Log;

class VendaService
{
    public static function store(array $request)
    {
        try {
            return Venda::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update(array $request, Venda $venda)
    {
        try {
            return $venda->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy(Venda $venda)
    {
        try {
            return $venda->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function VendasSelect($request)
    {
        if (isset($request['pesquisa'])) {
            return Venda::select('id', 'nome as text')
                            ->where('nome', 'like', "%" . $request['pesquisa'] . "%")
                            ->limit(10)
                            ->get();
        }

        return Venda::select('id', 'nome as text')
                        ->limit(10)
                        ->get();
    }
}
