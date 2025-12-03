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
        Schema::table('sales_dispute', function (Blueprint $table) {
            if (!Schema::hasColumn('sales_dispute', 'dispute_id')) {
                $table->integer('dispute_id')->nullable()->default(0)->after('salesorder_id');
            }
            if (!Schema::hasColumn('sales_dispute', 'reason')) {
                $table->text('reason')->nullable()->after('total_deduction');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_dispute', function (Blueprint $table) {
            if (Schema::hasColumn('sales_dispute', 'dispute_id')) {
                $table->dropColumn('dispute_id');
            }
            if (Schema::hasColumn('sales_dispute', 'reason')) {
                $table->dropColumn('reason');
            }
        });
    }
};
