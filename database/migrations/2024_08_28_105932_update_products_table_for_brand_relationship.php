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
        Schema::table('products', function (Blueprint $table) {
            // Remove the brand_name column
            $table->dropColumn('brand_name');

            // Add the brand_id column as a foreign key
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add the brand_name column back
            $table->string('brand_name')->nullable();

            // Remove the brand_id foreign key and column
            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');
        });
    }
};
