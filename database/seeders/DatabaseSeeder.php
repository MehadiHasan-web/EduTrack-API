<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mehadi Hasan',
            'email' => 'mhshakil06@gmail.com',
            'number' => '01642872846',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
    }
}
