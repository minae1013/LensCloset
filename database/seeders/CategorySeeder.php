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
        DB::table('categories')->insert([
            ['name' => '色素薄い系', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ナチュラル', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ハーフ系', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '水光レンズ', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ギャル系', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
