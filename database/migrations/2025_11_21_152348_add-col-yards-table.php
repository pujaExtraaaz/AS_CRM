<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('yards', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('yards', 'created_by')) {
                $table->text('created_by')->nullable()->after('contact');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('yards', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
    }
};
