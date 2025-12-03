<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        if (!Schema::hasTable('sales_dispute')) {
            Schema::create('sales_dispute', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id')->nullable()->default(0);
                $table->integer('salesorder_id')->nullable()->default(0);
                $table->date('dispute_date');
                $table->decimal('disputed_amount', 30, 2)->default('0.00');
                $table->decimal('gp_deduction', 30, 2)->default('0.00');
                $table->decimal('loss', 30, 2)->default('0.00');
                $table->decimal('total_deduction', 30, 2)->default('0.00');
                $table->integer('created_by')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('sales_dispute');
    }
};
