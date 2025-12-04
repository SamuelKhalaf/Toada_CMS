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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->string('date_range')->nullable(); // e.g., "December 15-17, 2025"
            $table->string('location_text')->nullable(); // e.g., "Malham Location"
            $table->text('location_url')->nullable(); // Google Maps URL
            $table->text('register_url_ar')->nullable(); // Registration URL for Arabic
            $table->text('register_url_en')->nullable(); // Registration URL for English
            $table->text('tags')->nullable(); // JSON array for tags
            $table->timestamp('published_at')->nullable();
            $table->integer('order')->default(0); // display order
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
