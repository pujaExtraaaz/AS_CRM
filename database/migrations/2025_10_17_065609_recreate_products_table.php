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
        // Drop the table if it already exists
        Schema::dropIfExists('products');

        // Create a new products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('year')->default('2020');
            $table->string('make')->nullable();      // Example: Brand or Manufacturer
            $table->string('model')->nullable();
            $table->string('part_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();  // includes created_at and updated_at
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
