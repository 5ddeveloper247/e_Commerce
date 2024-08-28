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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable(); // Optional Full Name
            $table->string('phone_number')->nullable(); // Optional Phone Number
            $table->string('email_address')->nullable(); // Optional Email Address
            $table->string('order_number')->nullable(); // Optional Order Number
            $table->string('company_name')->nullable(); // Optional Company Name
            $table->string('rma_number')->nullable(); // Optional RMA Number
            $table->text('comment')->nullable(); // Optional Comment
            $table->text('reply')->nullable(); // Optional Comment
            $table->integer('status')->nullable(); // Optional Comment
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
