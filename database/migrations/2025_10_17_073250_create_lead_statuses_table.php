<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::dropIfExists('lead_statuses');

        Schema::create('lead_statuses', function (Blueprint $table) {
            $table->id();

          
            $table->unsignedBigInteger('lead_id');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');

            
            $table->string('lead_status');

        
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('lead_statuses');
    }
};
