<?php

namespace Yaromir\ShopPackage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yaromir\ShopPackage\Models\Category;
use Yaromir\ShopPackage\Models\Product;


class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'price' => $this->faker->randomFloat(2,1,10000),
            'category_id' => Category::factory(),
        ];
    }

}
