<?php

namespace Yaromir\ShopPackage\Facades;

use Illuminate\Support\Facades\Facade;

class Delivery extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'delivery';
    }
}
