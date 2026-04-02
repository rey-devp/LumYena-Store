<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Game Top-Up',
                'slug' => 'game-topup',
                'icon' => '🎮',
            ],
            [
                'name' => 'Streaming',
                'slug' => 'streaming',
                'icon' => '📺',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
