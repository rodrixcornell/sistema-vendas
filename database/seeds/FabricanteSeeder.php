<?php

use App\Fabricante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FabricanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fabricante::class, 50)->create()->each(function ($fabricante) {
            // $user->posts()->save(factory(App\Post::class)->make());
            $fabricante->save();
        });
    }
}
