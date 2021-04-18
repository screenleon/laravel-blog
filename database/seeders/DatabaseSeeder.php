<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'Category One']);
        Category::factory()->create(['name' => 'Category Two']);
        Category::factory()->create(['name' => 'Category Three']);
        Category::factory()->create(['name' => 'Category Four']);

        // \App\Models\User::factory(10)->create();
        Post::factory(10)->create();
    }
}
