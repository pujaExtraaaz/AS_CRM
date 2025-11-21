<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('lead_statuses', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('lead_statuses', 'followup_note')) {
                $table->text('followup_note')->nullable()->after('lead_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('lead_statuses', function (Blueprint $table) {
            $table->dropColumn(['followup_note']);
        });
    }
};
