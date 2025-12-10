<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resume_analyses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->text('extracted_text')->nullable();
            $table->json('keywords')->nullable();
            $table->json('skills')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->json('work_experience')->nullable();
            $table->json('education')->nullable();
            $table->json('matched_programs')->nullable();
            $table->text('career_goals')->nullable();
            $table->string('preferred_field')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resume_analyses');
    }
};
