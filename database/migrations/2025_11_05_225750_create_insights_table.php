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
        Schema::create('insights', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->text('images')->nullable(); // JSON array
            $table->string('category_en');
            $table->string('category_ar');
            $table->text('tags')->nullable(); // JSON array
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
        Schema::dropIfExists('insights');
    }
};
