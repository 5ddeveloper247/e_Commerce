<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable()->unique()->comment('Stock Keeping Unit (unique identifier)');
            $table->unsignedBigInteger('category_id')->nullable()->comment('Foreign key to categories table');
            $table->string('brand_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('model_name')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->float('weight')->nullable()->comment('Weight in kg');
            $table->unsignedInteger('onhand_qty')->nullable(); // Stock is nullable now
            $table->text('description')->nullable();
            $table->boolean('status')->default(true)->nullable()->comment('Status: 1 = active, 0 = inactive');
            $table->softDeletes(); // Automatically adds a deleted_at column
            $table->unsignedBigInteger('created_by')->nullable()->comment('id to users');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('id to users');
            $table->unsignedBigInteger('deleted_by')->nullable()->comment('id to users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
