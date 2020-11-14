<?php

namespace App\Services;

use App\User;
use Throwable;
use Illuminate\Support\Facades\Log;

class UserService
{
    public static function store(array $request)
    {
        try {
            return User::Create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }
}
