<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('sales_return', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('sales_return', 'case_status')) {
//                $table->dropColumn(['refund_amount']);
                $table->string('salesreturn_tracknumber')->nullable()->after('salesreturn_id');
                $table->string('case_status')->nullable()->after('salesreturn_tracknumber');
//                $table->decimal('refund_received',30,2)->default('0.00')->after('request_type');
                $table->decimal('refund_issued', 30, 2)->default('0.00')->after('refund_amount');
                $table->decimal('gp_deduction', 30, 2)->default('0.00')->after('refund_issued');
                $table->decimal('loss', 30, 2)->default('0.00')->after('gp_deduction');
                $table->decimal('total_deduction', 30, 2)->default('0.00')->after('loss');
                $table->renameColumn('refund_amount', 'refund_received');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('sales_return', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'case_status')) {
                $table->renameColumn('refund_received', 'refund_amount');
                $table->dropColumn(['salesreturn_tracknumber', 'case_status', 'refund_issued', 'gp_deduction', 'loss', 'total_deduction']);
            }
        });
    }
};
