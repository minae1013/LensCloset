<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 例として3つのカテゴリを挿入
        DB::table('categories')->insert([
            ['name' => 'Technology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lifestyle', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
