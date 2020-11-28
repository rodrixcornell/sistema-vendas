<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'email' => 'admin@email.com',
            ],
            [
                'name' => 'Administrador Padrão',
                'password' => 'admnin',
                // 'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'type' => '1',
            ],
        );
    }
}
