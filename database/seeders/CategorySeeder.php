<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'LESCO 1',
            'LESCO 2',
            'LESCO 3',
            'LESCO 4',
            'LESCO 5',
            'LESCO 6',
            'Taller de LESCO Salud 1'
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category
            ]);
        }
    }
}
