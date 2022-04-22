<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yaromir\ShopPackage\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','description','price','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
