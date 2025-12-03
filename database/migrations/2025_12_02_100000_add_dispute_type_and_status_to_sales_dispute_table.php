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
            if (!Schema::hasColumn('sales_dispute', 'dispute_type')) {
                $table->string('dispute_type')->nullable()->after('dispute_date');
            }
            if (!Schema::hasColumn('sales_dispute', 'dispute_status')) {
                $table->string('dispute_status')->nullable()->after('dispute_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_dispute', function (Blueprint $table) {
            if (Schema::hasColumn('sales_dispute', 'dispute_type')) {
                $table->dropColumn('dispute_type');
            }
            if (Schema::hasColumn('sales_dispute', 'dispute_status')) {
                $table->dropColumn('dispute_status');
            }
        });
    }
};

