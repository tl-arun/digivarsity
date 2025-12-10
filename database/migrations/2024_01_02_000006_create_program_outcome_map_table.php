<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_outcome_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('outcome_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['program_id', 'outcome_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_outcome_map');
    }
};
