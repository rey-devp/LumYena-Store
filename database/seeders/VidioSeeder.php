<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariation;

class VidioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::firstOrCreate(
            ['slug' => 'premium-vidio'],
            [
                'name' => 'Premium Vidio',
                'description' => 'Akses eksklusif nonton film, original series, dan siaran langsung olahraga.',
                'price' => 18000,
                'category_id' => 2, // Asumsi 2 = Streaming
            ]
        );

        $product->variations()->delete();

        $vidio = [
            ['name' => '1 Minggu Sharing', 'price' => 18000, 'group' => 'Vidio Platinum'],
            ['name' => '1 Bulan 2U', 'price' => 26000, 'group' => 'Vidio Platinum'],
            ['name' => '1 Bulan Private', 'price' => 39000, 'group' => 'Vidio Platinum'],

            ['name' => '1 Bulan Sharing 2U (alldev)', 'price' => 69000, 'group' => 'Vidio Diamond'],
            ['name' => '1 Bulan Sharing 2U (mobile)', 'price' => 74000, 'group' => 'Vidio Diamond'],
            ['name' => '1 Bulan Private (alldev)', 'price' => 105000, 'group' => 'Vidio Diamond'],
        ];

        foreach ($vidio as $index => $item) {
            ProductVariation::create([
                'product_id' => $product->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }

        $product->update(['price' => collect($vidio)->min('price')]);
    }
}
