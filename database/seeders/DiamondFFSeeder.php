<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariation;

class DiamondFFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::firstOrCreate(
            ['slug' => 'diamond-ff'],
            [
                'name' => 'Diamond FF',
                'description' => 'Top Up Diamond Free Fire Aman dan Cepat.',
                'price' => 4500, // starting price
                'category_id' => 1,
            ]
        );

        // Delete existing variations to avoid duplicates if run multiple times
        $product->variations()->delete();

        $diamonds = [
            ['name' => '10 Diamond', 'price' => 4500, 'group' => 'Top Up Diamond'],
            ['name' => '20 Diamond', 'price' => 6500, 'group' => 'Top Up Diamond'],
            ['name' => '25 Diamond', 'price' => 7500, 'group' => 'Top Up Diamond'],
            ['name' => '30 Diamond', 'price' => 9500, 'group' => 'Top Up Diamond'],
            ['name' => '50 Diamond', 'price' => 11000, 'group' => 'Top Up Diamond'],
            ['name' => '70 Diamond', 'price' => 13000, 'group' => 'Top Up Diamond'],
            ['name' => '80 Diamond', 'price' => 14500, 'group' => 'Top Up Diamond'],
            ['name' => '100 Diamond', 'price' => 17500, 'group' => 'Top Up Diamond'],
            ['name' => '120 Diamond', 'price' => 22000, 'group' => 'Top Up Diamond'],
            ['name' => '130 Diamond', 'price' => 23500, 'group' => 'Top Up Diamond'],
            ['name' => '140 Diamond', 'price' => 24500, 'group' => 'Top Up Diamond'],
            ['name' => '145 Diamond', 'price' => 25000, 'group' => 'Top Up Diamond'],
            ['name' => '150 Diamond', 'price' => 26500, 'group' => 'Top Up Diamond'],
            ['name' => '200 Diamond', 'price' => 33000, 'group' => 'Top Up Diamond'],
            ['name' => '210 Diamond', 'price' => 34500, 'group' => 'Top Up Diamond'],
            ['name' => '325 Diamond', 'price' => 50000, 'group' => 'Top Up Diamond'],
            ['name' => '350 Diamond', 'price' => 53000, 'group' => 'Top Up Diamond'],
            ['name' => '355 Diamond', 'price' => 54000, 'group' => 'Top Up Diamond'],
            ['name' => '500 Diamond', 'price' => 73500, 'group' => 'Top Up Diamond'],
            ['name' => '510 Diamond', 'price' => 74500, 'group' => 'Top Up Diamond'],
            
            ['name' => 'Mingguan', 'price' => 32500, 'group' => 'Membership'],
            ['name' => 'Bulanan', 'price' => 93500, 'group' => 'Membership'],
            ['name' => 'BP', 'price' => 50000, 'group' => 'Membership'],
        ];

        foreach ($diamonds as $index => $item) {
            ProductVariation::create([
                'product_id' => $product->id,
                'name' => $item['name'],
                'price' => $item['price'],
                'group' => $item['group'],
                'order' => $index + 1,
            ]);
        }

        // Update the product's starting price
        $product->update(['price' => collect($diamonds)->min('price')]);
    }
}
