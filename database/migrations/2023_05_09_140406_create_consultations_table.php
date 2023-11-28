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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('consult_id');
            $table->decimal('weight')->default(0);
            $table->decimal('height')->default(0);
            $table->decimal('bmi')->default(0);
            $table->string('blood_pressure');
            $table->string('pulse_rate')->default(0);
            $table->string('blood_sugar')->default(0);
            $table->decimal('temperature')->default(0);
            $table->string('assigned_doctor')->nullable();

            $table->string('created_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
