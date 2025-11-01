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
        Schema::create('sales_invoice', function (Blueprint $table) {
            $table->id();            
            // Sales Order Information
            $table->date('sale_date');
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->enum('sale_status', ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->string('sales_order_number')->unique();
            $table->unsignedBigInteger('sourcing_agent_id');
            
            // Address Information
            $table->text('billing_address');
            $table->string('billing_country');
            $table->string('billing_state');
            $table->string('billing_city');
            $table->string('billing_postalcode');
            $table->text('shipping_address');
            $table->string('shipping_country');
            $table->string('shipping_state');
            $table->string('shipping_city');
            $table->string('shipping_postalcode');
            
            // Payment Information
            $table->enum('payment_gateway', ['card', 'paypal', 'zelle', 'bank_transfer', 'ach', 'invoice']);
            $table->string('name_on_card')->nullable();
            $table->string('card_number')->nullable();
            $table->string('expiration')->nullable();
            $table->string('cvv')->nullable();
            
            // Pricing Information
            $table->decimal('part_price', 10, 2);
            $table->decimal('shipping_price', 10, 2);
            $table->decimal('gross_profit', 10, 2);
            $table->decimal('charge_amount', 10, 2);
            $table->decimal('total_amount_quoted', 10, 2);
            
            // Additional Fields
            $table->text('agent_note')->nullable();
            $table->boolean('is_dispatch')->default(0);           
            $table->unsignedBigInteger('billing_contact_id')->nullable();
            $table->unsignedBigInteger('shipping_contact_id')->nullable();
            $table->unsignedBigInteger('shipping_provider_id')->nullable();            
            $table->unsignedBigInteger('created_by')->nullable();
            // Timestamps
            $table->timestamps();           
            
            // Foreign Key Constraints
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('sourcing_agent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('billing_contact_id')->references('id')->on('contacts')->onDelete('set null');
            $table->foreign('shipping_contact_id')->references('id')->on('contacts')->onDelete('set null');
            $table->foreign('shipping_provider_id')->references('id')->on('shipping_providers')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            
            // Indexes
            $table->index('sale_date');
            $table->index('sale_status');
            $table->index('sales_order_number');
            $table->index('sourcing_agent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoice');
    }
};
