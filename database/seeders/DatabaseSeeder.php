<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Lens;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Category::factory(3)->create();
        Lens::factory(15)->create();
    }
}
