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
            // Remove the model_id foreign key and column
            $table->dropForeign(['model_id']);
            $table->dropColumn('model_id');

            // Add the model_name column back
            $table->string('model_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Remove the model_name column
            $table->dropColumn('model_name');

            // Add the model_id column as a foreign key
            $table->foreignId('model_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};