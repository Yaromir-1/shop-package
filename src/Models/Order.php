<?php

namespace Yaromir\ShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id','paid_at','paid_amount','client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
