<?php

namespace Yaromir\ShopPackage\Facades;

use Illuminate\Support\Facades\Facade;

class Exchanger extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exchanger';
    }
}
