<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yaromir\ShopPackage\Database\Factories\StorageFactory;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','address'];

    protected static function newFactory()
    {
        return StorageFactory::new();
    }

}
