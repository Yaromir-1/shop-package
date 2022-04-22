<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yaromir\ShopPackage\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','measure'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }
}
