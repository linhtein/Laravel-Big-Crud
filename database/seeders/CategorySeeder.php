<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $categories = ["IT News","Sport","Food and Drink","Travel"];

        foreach($categories as $category){
            Category::factory()->create([
                "title"=>$category,
                "slug"=>Str::slug($category),
                "user_id"=>User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
