<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\PriceSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Leonel Lopez',
            'email' => 'lelobo@yahoo.com',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            PriceSeeder::class,
            CategorySeeder::class,
            LevelSeeder::class,
        ]);
    }
}
