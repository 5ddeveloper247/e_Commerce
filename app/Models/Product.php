<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'category_id',
        'brand_id',
        'product_name',
        'model_id',
        'price',
        'video_url',
        'discount_price',
        'featured',
        'weight',
        'onhand_qty',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',

    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function brand() {
        return $this->hasOne(Brand::class);
    }

    public function productModel() {
        return $this->hasOne(ProductModel::class);
    }
}
