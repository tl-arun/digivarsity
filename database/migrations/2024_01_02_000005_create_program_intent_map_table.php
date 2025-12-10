<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_intent_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('intent_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['program_id', 'intent_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_intent_map');
    }
};
