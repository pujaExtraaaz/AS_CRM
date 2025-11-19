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
        Schema::create('user_checkin_checkout_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('in_latitude')->nullable();
            $table->string('in_longitude')->nullable();
            $table->string('out_latitude')->nullable();
            $table->string('out_longitude')->nullable();
            $table->string('in_accuracy')->nullable();
            $table->string('in_battery_percent')->nullable();
            $table->string('out_accuracy')->nullable();
            $table->string('out_battery_percent')->nullable();
            $table->longText('in_notes')->nullable();
            $table->longText('out_notes')->nullable();
            $table->dateTime('check_in_time')->nullable();
            $table->dateTime('check_out_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_checkin_checkout_details');
    }
};
