<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yaromir\ShopPackage\Database\Factories\ClientFactory;


class Client extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','email','password'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected static function newFactory()
    {
        return ClientFactory::new();
    }
}
