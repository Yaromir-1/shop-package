<?php

namespace Yaromir\ShopPackage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yaromir\ShopPackage\Models\Provider;


class ProviderFactory extends Factory
{

    protected $model = Provider::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->e164PhoneNumber(),
        ];
    }

}
