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
        Schema::create('flipbook_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flipbook_id')->constrained()->onDelete('cascade');
            $table->string('language', 2); // 'ar', 'en'
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->timestamps();
            
            // Unique constraint: one translation per flipbook-language combination
            $table->unique(['flipbook_id', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flipbook_translations');
    }
};
