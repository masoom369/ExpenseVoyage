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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->integer('budget');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
