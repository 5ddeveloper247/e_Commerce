<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $table = "states";

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'state_id');
    }

    public function orderShippingAddress()
    {
        return $this->belongsTo(OrderShippingAddress::class, 'state_id');
    }
}
