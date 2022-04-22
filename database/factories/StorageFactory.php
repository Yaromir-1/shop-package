<?php

namespace Yaromir\ShopPackage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yaromir\ShopPackage\Models\Storage;


class StorageFactory extends Factory
{

    protected $model = Storage::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
        ];
    }

}
