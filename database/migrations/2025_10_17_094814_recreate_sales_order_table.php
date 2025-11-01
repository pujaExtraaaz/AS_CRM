<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       
        Schema::dropIfExists('sales_orders');

    
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();

            
            $table->date('sale_date')->nullable();
            $table->string('sale_status')->nullable();

            
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->unsignedBigInteger('yard_id')->nullable();
            $table->unsignedBigInteger('sales_user_id')->nullable();
            $table->unsignedBigInteger('source_id')->nullable(); // Source agent id
           // $table->unsignedBigInteger('lead_type_id')->nullable();

        
            $table->string('vin_number')->nullable();
            $table->string('part_number')->nullable();
            $table->string('part_type')->nullable();
            $table->string('source_type')->nullable();

            $table->text('billing_address_text')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_city')->nullable();

            $table->text('shipping_address_text')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_city')->nullable();

            $table->string('payment_gateway_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('expiration')->nullable();
            $table->string('cvv_number')->nullable();

            $table->decimal('part_price', 15, 2)->nullable();
            $table->decimal('shipping_price', 15, 2)->nullable();
            $table->decimal('gross_profit', 15, 2)->nullable();
            $table->decimal('charge_amount', 15, 2)->nullable();
            $table->decimal('total_amount_quoted', 15, 2)->nullable();

            $table->text('agent_note')->nullable();
            $table->date('yard_order_date')->nullable();
            $table->text('comment')->nullable();
            $table->string('card_used')->nullable();
            $table->string('tracking_no')->nullable();
            $table->date('delivery_date')->nullable();

            $table->timestamps();

            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('set null');
            $table->foreign('yard_id')->references('id')->on('yards')->onDelete('set null');
            $table->foreign('source_id')->references('id')->on('users')->onDelete('set null'); // Source agent
            $table->foreign('sales_user_id')->references('id')->on('users')->onDelete('set null'); // Source agent
           // $table->foreign('lead_type_id')->references('id')->on('lead_types')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
