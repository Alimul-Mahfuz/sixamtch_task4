<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('PRAGMA foreign_keys = OFF;');
        DB::table('users')->delete();
        DB::statement('PRAGMA foreign_keys = ON;');
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => 2,
                'name' => 'Test User 1',
                'email' => 'testuser1@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'id' => 3,
                'name' => 'Test User 3',
                'email' => 'testuser3@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,
                'created_at' => now(),
                'updated_at' => now(),

            ],

        ]);

    }
}
