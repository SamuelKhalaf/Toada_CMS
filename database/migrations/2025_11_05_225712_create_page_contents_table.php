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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_name'); // 'index', 'about', 'services', 'contact'
            $table->string('section_key'); // unique identifier for each section
            $table->string('content_type')->default('text'); // 'text', 'textarea', 'richtext', 'image'
            $table->string('language', 2); // 'ar', 'en'
            $table->text('content')->nullable(); // JSON for complex content with multiple fields
            $table->string('image_path')->nullable(); // single image path
            $table->text('images')->nullable(); // JSON array for multiple images
            $table->timestamps();
            
            // Unique constraint: one content per page-section-language combination
            $table->unique(['page_name', 'section_key', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
