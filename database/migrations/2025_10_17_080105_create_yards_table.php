<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
       
        Schema::dropIfExists('yards');

      
        Schema::create('yards', function (Blueprint $table) {
            $table->id();
            $table->string('yard_name');
            $table->string('yard_address')->nullable();
            $table->string('yard_email')->nullable();
            $table->string('yard_person_name')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('yards');
    }
};
