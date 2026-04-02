<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariation;

class StreamingAppsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==========================
        // 1. PREMIUM VIU
        // ==========================
        $viu = Product::firstOrCreate(
            ['slug' => 'premium-viu'],
            [
                'name' => 'Premium Viu',
                'description' => 'Akses eksklusif nonton drama Korea, variety show, dan serial terbaru tanpa iklan.',
                'price' => 6000,
                'category_id' => 2,
            ]
        );

        $viu->variations()->delete();

        $viuVariations = [
            ['name' => '1 Hari', 'price' => 6000, 'group' => 'Viu Premi Biasa'],
            ['name' => '3 Hari', 'price' => 8000, 'group' => 'Viu Premi Biasa'],
            ['name' => '1 Minggu', 'price' => 9500, 'group' => 'Viu Premi Biasa'],
            ['name' => '1 Bulan', 'price' => 12000, 'group' => 'Viu Premi Biasa'],
            ['name' => '2 Bulan', 'price' => 13000, 'group' => 'Viu Premi Biasa'],
            ['name' => '6 Bulan', 'price' => 19000, 'group' => 'Viu Premi Biasa'],
            ['name' => '1 Tahun', 'price' => 21000, 'group' => 'Viu Premi Biasa'],

            ['name' => '1 Bulan', 'price' => 14000, 'group' => 'Viu Premi Anti Limit'],
            ['name' => '2 Bulan', 'price' => 17000, 'group' => 'Viu Premi Anti Limit'],
            ['name' => '3 Bulan', 'price' => 18000, 'group' => 'Viu Premi Anti Limit'],
            ['name' => '6 Bulan', 'price' => 20000, 'group' => 'Viu Premi Anti Limit'],
            ['name' => '1 Tahun', 'price' => 26000, 'group' => 'Viu Premi Anti Limit'],
        ];

        foreach ($viuVariations as $index => $item) {
            ProductVariation::create([
                'product_id' => $viu->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }
        $viu->update(['price' => collect($viuVariations)->min('price')]);

        // ==========================
        // 2. PREMIUM NETFLIX
        // ==========================
        $netflix = Product::firstOrCreate(
            ['slug' => 'premium-netflix'],
            [
                'name' => 'Premium Netflix',
                'description' => 'Akses eksklusif nonton film, series Netflix Original di berbagai device.',
                'price' => 5500,
                'category_id' => 2,
            ]
        );

        $netflix->variations()->delete();

        $netflixVariations = [
            ['name' => '1 Hari', 'price' => 6000, 'group' => 'Sharing 1P 1U'],
            ['name' => '3 Hari', 'price' => 9000, 'group' => 'Sharing 1P 1U'],
            ['name' => '4 Hari', 'price' => 11000, 'group' => 'Sharing 1P 1U'],
            ['name' => '1 Minggu', 'price' => 16000, 'group' => 'Sharing 1P 1U'],
            ['name' => '1 Bulan', 'price' => 37000, 'group' => 'Sharing 1P 1U'],

            ['name' => '1 Hari', 'price' => 5500, 'group' => 'Sharing 1P 2U'],
            ['name' => '3 Hari', 'price' => 7500, 'group' => 'Sharing 1P 2U'],
            ['name' => '1 Minggu', 'price' => 14000, 'group' => 'Sharing 1P 2U'],
            ['name' => '1 Bulan', 'price' => 24000, 'group' => 'Sharing 1P 2U'],

            ['name' => '1 Bulan', 'price' => 48000, 'group' => 'Semi Private'],

            ['name' => '1 Bulan', 'price' => 158000, 'group' => 'Private'],
        ];

        foreach ($netflixVariations as $index => $item) {
            ProductVariation::create([
                'product_id' => $netflix->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }
        $netflix->update(['price' => collect($netflixVariations)->min('price')]);
    }
}
