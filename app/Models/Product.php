<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductFeature;
use App\Models\ProductSpecification;
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
        'model_name',
        'video_url',
        'price',
        'discount_price',
        'featured',
        'weight',
        'onhand_qty',
        'description',
        'is_offered',
        'is_featured',
        'status',
        'created_by',
        'updated_by',
        'offered_percentage',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function brand() {
        return $this->hasOne(Brand::class);
    }

    public function productSpecifications() {
        return $this->hasMany(ProductSpecification::class);
    }

    public function productFeatures() {
        return $this->hasMany(ProductFeature::class);
    }
}
