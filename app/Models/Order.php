<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";
    protected $fillable = [
        'user_id',
        'status',
        'date',
        'comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderShippingAddress::class);
    }

    public function orderPayment()
    {
        return $this->hasOne(OrderPayment::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status');
    }
}
