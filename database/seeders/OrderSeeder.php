<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Yaromir\ShopPackage\Models\Client;
use Yaromir\ShopPackage\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::get()->each(function (Client $client) {
            Order::factory()->create([
                'client_id' => $client->id
            ]);
        });
    }
}
