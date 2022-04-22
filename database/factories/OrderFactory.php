<?php

namespace Yaromir\ShopPackage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Yaromir\ShopPackage\Models\Client;
use Yaromir\ShopPackage\Models\Order;


class OrderFactory extends Factory
{

    protected $model = Order::class;

    public function definition()
    {
        return [
            'paid_at' => $this->faker->dateTime(),
            'paid_amount' => $this->faker->randomFloat(2,1,10000),
            'client_id' => Client::factory(),
        ];
    }

}
