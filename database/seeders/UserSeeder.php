<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        User::factory()->create([
            "name"=>"Lin Htein",
            "email"=>"linlin1234@gmail.com",
            'rolle'=>'admin',
            "password"=>Hash::make('linlin1234')
        ]);

        User::factory()->create([
            "name"=>"Test Admin",
            "email"=>"admin@gmail.com",
            'rolle'=>'admin',
            "password"=>Hash::make('linlin1234')
        ]);

        User::factory()->create([
            "name"=>"Test Editor",
            "email"=>"editor@gmail.com",
            'rolle'=>'editor',
            "password"=>Hash::make('linlin1234')
        ]);

        User::factory()->create([
            "name"=>"Test Author",
            "email"=>"author@gmail.com",
            'rolle'=>'author',
            "password"=>Hash::make('linlin1234')
        ]);
    }
}
