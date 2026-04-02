<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gameTopUp = Category::where('slug', 'game-topup')->first();
        $streaming = Category::where('slug', 'streaming')->first();

        $products = [
            // Game Top-Up Products
            [
                'category_id' => $gameTopUp->id,
                'name' => 'Free Fire',
                'slug' => 'diamond-ff',
                'description' => 'Top-up diamond untuk game Free Fire. Gunakan diamond untuk membeli item premium, skin senjata, dan karakter eksklusif di dalam game.',
                'price' => 10000,
                'image' => 'free-fire.png',
                'is_active' => true,
            ],
            [
                'category_id' => $gameTopUp->id,
                'name' => 'Weekly Diamond ML',
                'slug' => 'weekly-diamond-ml',
                'description' => 'Paket diamond mingguan untuk Mobile Legends: Bang Bang. Dapatkan diamond setiap hari selama satu minggu untuk membeli hero dan skin favorit.',
                'price' => 28000,
                'image' => 'weekly-diamond-ml.png',
                'is_active' => true,
            ],
            [
                'category_id' => $gameTopUp->id,
                'name' => 'Gems Zepeto',
                'slug' => 'gems-zepeto',
                'description' => 'Top-up gems untuk Zepeto. Gunakan gems untuk membeli pakaian, aksesoris, dan item dekorasi untuk avatar dan dunia virtualmu.',
                'price' => 15000,
                'image' => 'gems-zepeto.png',
                'is_active' => true,
            ],
            [
                'category_id' => $gameTopUp->id,
                'name' => 'Coins Zepeto',
                'slug' => 'coins-zepeto',
                'description' => 'Top-up coins untuk Zepeto. Coins digunakan untuk membeli item dasar, berinteraksi dengan pemain lain, dan menikmati fitur-fitur menarik di Zepeto.',
                'price' => 12000,
                'image' => 'coins-zepeto.png',
                'is_active' => true,
            ],
            [
                'category_id' => $gameTopUp->id,
                'name' => 'Robux',
                'slug' => 'robux',
                'description' => 'Top-up Robux untuk Roblox. Robux adalah mata uang utama di Roblox untuk membeli game pass, item avatar, dan akses ke konten eksklusif.',
                'price' => 20000,
                'image' => 'robux.png',
                'is_active' => true,
            ],

            // Streaming Products
            [
                'category_id' => $streaming->id,
                'name' => 'Premium Vidio',
                'slug' => 'premium-vidio',
                'description' => 'Langganan premium Vidio untuk akses tanpa batas ke film, serial TV, olahraga live, dan konten original Vidio. Nikmati streaming berkualitas HD tanpa iklan.',
                'price' => 49000,
                'image' => 'premium-vidio.png',
                'is_active' => true,
            ],
            [
                'category_id' => $streaming->id,
                'name' => 'Premium Viu',
                'slug' => 'premium-viu',
                'description' => 'Langganan premium Viu untuk menonton drama Korea, drama Asia, variety show, dan anime tanpa batas. Streaming HD tanpa iklan dengan subtitle bahasa Indonesia.',
                'price' => 45000,
                'image' => 'premium-viu.png',
                'is_active' => true,
            ],
            [
                'category_id' => $streaming->id,
                'name' => 'Premium Netflix',
                'slug' => 'premium-netflix',
                'description' => 'Langganan premium Netflix untuk akses ke ribuan film, serial TV, dokumenter, dan konten original Netflix. Streaming Ultra HD 4K di berbagai perangkat.',
                'price' => 54000,
                'image' => 'premium-netflix.png',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
