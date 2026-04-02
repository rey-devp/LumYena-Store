<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariation;

class ZepetoRobuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==========================
        // 1. COINS ZEPETO
        // ==========================
        $zepetoCoins = Product::firstOrCreate(
            ['slug' => 'coins-zepeto'],
            [
                'name' => 'Coins Zepeto',
                'description' => 'Top Up Coins Zepeto resmi 100% legal, murah, dan instan.',
                'price' => 18500,
                'category_id' => 1,
            ]
        );

        $zepetoCoins->variations()->delete();

        $coinsVariations = [
            ['name' => '4.680 coins', 'price' => 18500, 'group' => 'Top Up Coins'],
            ['name' => '9.700 coins', 'price' => 32500, 'group' => 'Top Up Coins'],
            ['name' => '10.200 coins', 'price' => 48500, 'group' => 'Top Up Coins'],
            ['name' => '25.200 coins', 'price' => 56500, 'group' => 'Top Up Coins'],
            ['name' => '38.900 coins', 'price' => 122500, 'group' => 'Top Up Coins'],
            ['name' => '40.700 coins', 'price' => 122500, 'group' => 'Top Up Coins'],
            ['name' => '62.800 coins', 'price' => 196500, 'group' => 'Top Up Coins'],
            ['name' => '110.000 coins', 'price' => 310500, 'group' => 'Top Up Coins'],
            ['name' => '234.000 coins', 'price' => 534500, 'group' => 'Top Up Coins'],
            ['name' => '300.000 coins', 'price' => 674500, 'group' => 'Top Up Coins'],
        ];

        foreach ($coinsVariations as $index => $item) {
            ProductVariation::create([
                'product_id' => $zepetoCoins->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }
        $zepetoCoins->update(['price' => collect($coinsVariations)->min('price')]);


        // ==========================
        // 2. ROBUX (ROBLOX)
        // ==========================
        $robux = Product::firstOrCreate(
            ['slug' => 'robux'],
            [
                'name' => 'Robux',
                'description' => 'Top Up Robux (Roblox) murah, cepat, dan terpercaya.',
                'price' => 7000,
                'category_id' => 1,
            ]
        );

        $robux->variations()->delete();

        $robuxVariations = [
            ['name' => '25 Robux', 'price' => 7000, 'group' => 'Top Up Robux'],
            ['name' => '50 Robux', 'price' => 12500, 'group' => 'Top Up Robux'],
            ['name' => '75 Robux', 'price' => 14500, 'group' => 'Top Up Robux'],
            ['name' => '100 Robux', 'price' => 18000, 'group' => 'Top Up Robux'],
            ['name' => '125 Robux', 'price' => 21500, 'group' => 'Top Up Robux'],
            ['name' => '150 Robux', 'price' => 26500, 'group' => 'Top Up Robux'],
            ['name' => '175 Robux', 'price' => 28500, 'group' => 'Top Up Robux'],
            ['name' => '200 Robux', 'price' => 33000, 'group' => 'Top Up Robux'],
            ['name' => '225 Robux', 'price' => 35500, 'group' => 'Top Up Robux'],
            ['name' => '250 Robux', 'price' => 41500, 'group' => 'Top Up Robux'],
            ['name' => '275 Robux', 'price' => 42500, 'group' => 'Top Up Robux'],
            ['name' => '300 Robux', 'price' => 48000, 'group' => 'Top Up Robux'],
            ['name' => '325 Robux', 'price' => 49500, 'group' => 'Top Up Robux'],
            ['name' => '350 Robux', 'price' => 56500, 'group' => 'Top Up Robux'],
            ['name' => '375 Robux', 'price' => 57500, 'group' => 'Top Up Robux'],
            ['name' => '400 Robux', 'price' => 63000, 'group' => 'Top Up Robux'],
            ['name' => '425 Robux', 'price' => 64500, 'group' => 'Top Up Robux'],
            ['name' => '450 Robux', 'price' => 71500, 'group' => 'Top Up Robux'],
            ['name' => '475 Robux', 'price' => 73500, 'group' => 'Top Up Robux'],
            ['name' => '500 Robux', 'price' => 78000, 'group' => 'Top Up Robux'],
        ];

        foreach ($robuxVariations as $index => $item) {
            ProductVariation::create([
                'product_id' => $robux->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }
        $robux->update(['price' => collect($robuxVariations)->min('price')]);
    }
}
