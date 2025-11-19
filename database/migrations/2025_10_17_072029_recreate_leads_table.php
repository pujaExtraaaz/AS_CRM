<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {      
        Schema::dropIfExists('sales_invoice');
        Schema::dropIfExists('leads');

       
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();

          
            $table->unsignedBigInteger('lead_type_id')->nullable();
            $table->foreign('lead_type_id')->references('id')->on('lead_type')->onDelete('set null');

          
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');

            $table->string('disposition')->nullable()->default(0); // status or outcome
            $table->text('note')->nullable();

          
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the foreign key constraint from sales_invoice table
        Schema::table('sales_invoice', function (Blueprint $table) {
            $table->dropForeign(['lead_id']);
        });
        
        Schema::dropIfExists('leads');
    }
};
