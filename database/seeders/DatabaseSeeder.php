<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Fernand',
            'email' => 'fernand@gmail.com',
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),
            'password' => Hash::make('zxczxc'),
            'remember_token' => Str::random(10),
        ]);

        $this->call(ProductSeeder::class);
    }
}