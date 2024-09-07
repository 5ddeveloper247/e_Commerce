<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $table = "shipping_address";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id'); // Correct relationship
    }

    public function state()
    {
        return $this->belongsTo(States::class, 'state_id'); // Correct relationship
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id'); // Correct relationship
    }
}
