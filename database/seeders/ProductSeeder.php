<?php

namespace Database\Seeders;

use App\Models\Product;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Green Points',
                'description' => '',
                'price' => 100,
                'img' => 'products/product-points.png',
                'is_visible' => true,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Donation',
                'description' => '',
                'price' => 1,
                'img' => 'products/product-donation.png',
                'is_visible' => true,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Donation',
                'description' => '',
                'price' => 1,
                'img' => 'products/product-donation.png',
                'is_visible' => true,
                'is_available' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
