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
        Schema::create('yard_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_order_id')->nullable();
            $table->unsignedBigInteger('yard_id')->nullable();
            $table->text('comments')->nullable();
            $table->string('card_used')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->date('yard_order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->timestamps();
            
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onDelete('cascade');
            $table->foreign('yard_id')->references('id')->on('yards')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yard_logs');
    }
};
