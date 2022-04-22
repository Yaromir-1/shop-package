<?php

namespace Yaromir\ShopPackage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yaromir\ShopPackage\Models\Category;


class CategoryFactory extends Factory
{

    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'measure' => $this->faker->randomElement(['kg','pc']),
        ];
    }

}
