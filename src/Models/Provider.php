<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yaromir\ShopPackage\Database\Factories\ProviderFactory;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','phone_number'];

    protected static function newFactory()
    {
        return ProviderFactory::new();
    }
}
