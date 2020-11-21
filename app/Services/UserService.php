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
            return User::create($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function update(array $request, User $user)
    {
        try {
            return $user->update($request);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }

    public static function destroy(User $user)
    {
        try {
            return $user->delete();
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return null;
        }
    }
}
