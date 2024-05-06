<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(NationalitySeeder::class);
        $this->call(TypeBloodSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SpecializationSeeder::class);

        // ClassRoom::factory(10)->create();

    }
}