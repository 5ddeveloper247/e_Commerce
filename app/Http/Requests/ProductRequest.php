<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ensure proper authorization logic is implemented.
    }

    public function rules()
    {
        $rules = [
            'sku' => 'nullable|string|max:255|unique:products,sku,' . ($this->product_id ?? 'NULL'),
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'product_name' => 'nullable|string|max:255',
            'model_name' => 'nullable|string|max:255',
            'video_url' => 'nullable|url',
            'price' => 'nullable|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'onhand_qty' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'is_offered' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'offered_percentage' => 'nullable|numeric|between:0,100',
            'product_id' => 'nullable|integer|exists:products,id', // Only required for update
        ];

        return $rules;
    }
}