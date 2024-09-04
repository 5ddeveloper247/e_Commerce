<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = "cities";

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'city_id');
    }

    public function orderShippingAddress()
    {
        return $this->belongsTo(OrderShippingAddress::class, 'city_id');
    }
}
