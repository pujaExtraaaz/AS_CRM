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
        Schema::table('sales_orders', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('sales_orders','source_date')) {
                $table->date('source_date')->nullable()->after('source_id');
                $table->string('name_on_card')->nullable()->after('payment_gateway_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_orders', function (Blueprint $table) {
            $table->dropColumn(['source_date','name_on_card']);
        });
    }
};
