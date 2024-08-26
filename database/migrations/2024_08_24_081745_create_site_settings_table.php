<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('phone', 15);
            $table->string('email', 50);
            $table->string('address', 255);
            $table->string('website_name', 50);
            $table->string('banner_heading', 255);
            $table->string('sub_heading', 255);
            $table->string('logo')->nullable(); // Path to the logo image file
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
