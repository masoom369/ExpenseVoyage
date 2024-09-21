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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('trip_id')->constrained('trips')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('trip_date');
            $table->integer('amount');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
