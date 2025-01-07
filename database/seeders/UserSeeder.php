<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'email' => 'testuser@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'), 
            'remember_token' => Str::random(10), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => '山田 太郎',
            'email' => 'yamada@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'), 
            'remember_token' => Str::random(10), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
