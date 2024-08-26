<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'category_id',
        'brand_name',
        'product_name',
        'model_name',
        'price',
        'discount_price',
        'weight',
        'onhand_qty',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
