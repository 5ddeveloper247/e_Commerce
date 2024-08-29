<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'description',
        'filename',
        'filepath'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}