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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('warehouse_id')->nullable()->after('user_id');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('set null');
            $table->string('year')->nullable()->default('2020')->after('status'); // rollback
            $table->string('make')->nullable()->after('year')->after('year'); // add 'make' column
            $table->string('part_number')->default('90ab-14ab')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['warehouse_id']);
        $table->dropColumn(['warehouse_id','year','make']);
        });
    }
};
