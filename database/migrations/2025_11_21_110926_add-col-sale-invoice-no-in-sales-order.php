<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('sales_orders', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('sales_orders', 'sale_invoice_number')) {
                $table->text('sale_invoice_number')->nullable()->after('id');
                $table->text('billing_zipcode')->nullable()->after('billing_city');
                $table->text('shipping_zipcode')->nullable()->after('shipping_city');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('sales_orders', function (Blueprint $table) {
            $table->dropColumn(['sale_invoice_number', 'billing_zipcode', 'shipping_zipcode']);
        });
    }
};
