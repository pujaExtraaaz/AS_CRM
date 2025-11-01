<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('leads', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('leads','product_id')) {
                $table->integer('product_id')->nullable()->after('user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['product_id']);
        });
    }
};
