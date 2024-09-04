<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShippingAddress extends Model
{
    use HasFactory;

    protected $table = "order_shipping_address";

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    
    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }
}
