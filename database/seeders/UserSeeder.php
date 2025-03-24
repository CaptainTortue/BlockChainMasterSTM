<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // if test user not already exists
        if (User::where('email', 'test@gmail.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@gmail.com',
                'login' => 'test',
                'password' => bcrypt('testUser'),
                'role' => 'user'
            ]);
        }

        if (User::where('email', 'test_admin@gmail.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Test admin',
                'email' => 'test_admin@gmail.com',
                'login' => 'test admin',
                'password' => bcrypt('testAdmin'),
                'role' => 'admin'
            ]);
        }
    }
}
