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
        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('language', 2); // 'ar', 'en'
            $table->string('title');
            $table->text('description');
            $table->string('badge_text')->nullable(); // e.g., "Upcoming Event"
            $table->timestamps();
            
            // Unique constraint: one translation per project-language combination
            $table->unique(['project_id', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_translations');
    }
};
