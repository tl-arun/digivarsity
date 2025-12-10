<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->foreignId('intent_id')->nullable()->after('university_id')->constrained()->onDelete('set null');
            $table->foreignId('outcome_id')->nullable()->after('intent_id')->constrained()->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign(['intent_id']);
            $table->dropForeign(['outcome_id']);
            $table->dropColumn(['intent_id', 'outcome_id']);
        });
    }
};
