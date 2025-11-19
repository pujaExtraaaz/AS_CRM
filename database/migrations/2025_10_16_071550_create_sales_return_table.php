<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('sales_return', function (Blueprint $table) {
            $table->id();            
            $table->integer('user_id')->nullable()->default(0);
            $table->integer('lead_id')->nullable()->default(0);
            $table->integer('salesorder_id')->nullable()->default(0);
            $table->integer('salesreturn_id')->nullable()->default(0);
            $table->string('request_type')->nullable()->default(0);
            $table->decimal('refund_amount', 30, 2)->nullable();
            $table->text('reason')->nullable();
            $table->date('return_date');
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('sales_return');
    }
};
