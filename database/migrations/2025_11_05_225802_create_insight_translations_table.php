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
        Schema::create('insight_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insight_id')->constrained()->onDelete('cascade');
            $table->string('language', 2); // 'ar', 'en'
            $table->string('title');
            $table->text('description');
            $table->longText('body')->nullable(); // rich content
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            
            // Unique constraint: one translation per insight-language combination
            $table->unique(['insight_id', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insight_translations');
    }
};
