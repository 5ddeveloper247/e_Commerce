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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment("Title or name of the brand");
            $table->text('description')->nullable()->comment("Description of the brand");
            $table->string('url')->nullable()->comment("URL associated with the brand");
            $table->boolean('status')->default(true)->comment("Status of the brand (active/inactive)");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
