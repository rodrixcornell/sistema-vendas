<?php

namespace App\Services;

use App\Models\Fabricante;
use Throwable;
use Illuminate\Support\Facades\Log;

class FabricanteService
{
    public static function store(array $request)
    {
        try {
            return Fabricante::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update(array $request, Fabricante $fabricante)
    {
        try {
            return $fabricante->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy(Fabricante $fabricante)
    {
        try {
            return $fabricante->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function fabricantesSelect($request)
    {
        if (isset($request['pesquisa'])) {
            return Fabricante::select('id', 'nome as text')
                            ->where('nome', 'like', "%" . $request['pesquisa'] . "%")
                            ->limit(10)
                            ->get();
        }

        return Fabricante::select('id', 'nome as text')
                        ->limit(10)
                        ->get();
    }
}
