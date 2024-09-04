<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'country_id');
    }

    public function orderShippingAddress()
    {
        return $this->belongsTo(OrderShippingAddress::class, 'country_id');
    }
}
