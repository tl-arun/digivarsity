<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['online', 'odl', 'work-linked', 'executive']);
            $table->text('description')->nullable();
            $table->text('curriculum')->nullable();
            $table->string('duration')->nullable();
            $table->string('mode')->nullable();
            $table->decimal('fees', 10, 2)->nullable();
            $table->text('eligibility')->nullable();
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            $table->json('intent_tags')->nullable();
            $table->json('outcome_tags')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
