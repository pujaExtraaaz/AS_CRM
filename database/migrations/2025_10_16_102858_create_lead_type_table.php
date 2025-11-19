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
        Schema::create('lead_type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });

        // Insert default lead type
        $leadType = [
            ['name' => 'Inbound Call', 'created_by' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Form Lead', 'created_by' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Email Lead', 'created_by' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Form Call', 'created_by' => 0, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('lead_type')->insert($leadType);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_type');
    }
};
