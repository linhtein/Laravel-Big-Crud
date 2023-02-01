<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nation;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nations = ["myanmar","china","singapore","thailand","japan"];

        foreach($nations as $nation){
           Nation::factory()->create([
                "name" => $nation
           ]);
        }
    }
}
