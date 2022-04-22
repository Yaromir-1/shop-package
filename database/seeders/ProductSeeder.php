<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Yaromir\ShopPackage\Models\Category;
use Yaromir\ShopPackage\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::get()->each(function (Category $category) {
            Product::factory()->count(5)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
