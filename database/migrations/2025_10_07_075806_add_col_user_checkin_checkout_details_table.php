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
         Schema::table('user_checkin_checkout_details', function (Blueprint $table) {
            // if not exist, add the new column
            if (!Schema::hasColumn('user_checkin_checkout_details', 'is_checkIn')) {
                $table->boolean('is_checkIn')->default(0)->after('out_notes');
                $table->boolean('is_checkOut')->default(0)->after('is_checkIn');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('user_checkin_checkout_details', function (Blueprint $table) {
            $table->dropColumn(['is_checkIn','is_checkOut']);
        });
    }
};
