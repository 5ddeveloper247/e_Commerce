<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

    // Remove or adjust this method if there's no foreign key pointing back to ShippingAddress
    public function shippingAddress()
    {
        return $this->hasMany(ShippingAddress::class, 'country_id');
    }
}
