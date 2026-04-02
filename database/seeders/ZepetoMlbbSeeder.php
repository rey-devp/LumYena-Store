<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariation;

class ZepetoMlbbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==========================
        // 1. WEEKLY DIAMOND PASS (MLBB)
        // ==========================
        $mlbbWDP = Product::firstOrCreate(
            ['slug' => 'weekly-diamond-ml'],
            [
                'name' => 'Weekly Diamond ML',
                'description' => 'Top Up Weekly Diamond Pass Mobile Legends (MLBB) murah, aman, dan instan.',
                'price' => 33000,
                'category_id' => 1,
            ]
        );

        $mlbbWDP->variations()->delete();

        $wdpVariations = [
            ['name' => 'Weekly Diamond Pass', 'price' => 33000, 'group' => 'Weekly Pass Packages'],
            ['name' => 'Weekly Diamond Pass 2×', 'price' => 61000, 'group' => 'Weekly Pass Packages'],
            ['name' => 'Weekly Diamond Pass 3×', 'price' => 89000, 'group' => 'Weekly Pass Packages'],
            ['name' => 'Weekly Diamond Pass 4×', 'price' => 117000, 'group' => 'Weekly Pass Packages'],
            ['name' => 'Weekly Diamond Pass 5×', 'price' => 145000, 'group' => 'Weekly Pass Packages'],
        ];

        foreach ($wdpVariations as $index => $item) {
            ProductVariation::create([
                'product_id' => $mlbbWDP->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }
        $mlbbWDP->update(['price' => collect($wdpVariations)->min('price')]);


        // ==========================
        // 2. ZEMS ZEPETO (Rename from Gems)
        // ==========================
        // Fix typo inside the db first
        $zepeto = Product::where('slug', 'gems-zepeto')->first();
        if ($zepeto) {
            $zepeto->update([
                'name' => 'Zems Zepeto',
                'slug' => 'zems-zepeto',
            ]);
        } else {
            // Find by new slug or create
            $zepeto = Product::firstOrCreate(
                ['slug' => 'zems-zepeto'],
                [
                    'name' => 'Zems Zepeto',
                    'description' => 'Top Up Zems Zepeto termurah dan legal 100%.',
                    'price' => 11500,
                    'category_id' => 1,
                ]
            );
        }

        $zepeto->variations()->delete();

        $zemsVariations = [
            ['name' => '7 zems', 'price' => 11500, 'group' => 'Top Up Zems'],
            ['name' => '14 zems', 'price' => 13500, 'group' => 'Top Up Zems'],
            ['name' => '28 zems', 'price' => 20500, 'group' => 'Top Up Zems'],
            ['name' => '58 zems', 'price' => 38500, 'group' => 'Top Up Zems'],
            ['name' => '60 zems', 'price' => 70500, 'group' => 'Top Up Zems'],
            ['name' => '125 zems', 'price' => 75000, 'group' => 'Top Up Zems'],
            ['name' => '128 zems', 'price' => 75500, 'group' => 'Top Up Zems'],
            ['name' => '323 zems', 'price' => 186000, 'group' => 'Top Up Zems'],
            ['name' => '770 zems', 'price' => 693000, 'group' => 'Top Up Zems'],
            ['name' => '1000 zems', 'price' => 553000, 'group' => 'Top Up Zems'],
        ];

        foreach ($zemsVariations as $index => $item) {
            ProductVariation::create([
                'product_id' => $zepeto->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }
        $zepeto->update(['price' => collect($zemsVariations)->min('price')]);
    }
}
