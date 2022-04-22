<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yaromir\ShopPackage\Database\Factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id','paid_at','paid_amount','client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    protected static function newFactory()
    {
        return OrderFactory::new();
    }
}
