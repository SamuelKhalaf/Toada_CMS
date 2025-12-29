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
        Schema::table('flipbooks', function (Blueprint $table) {
            // Add language-specific URL columns
            $table->string('heyzine_url_en')->nullable()->after('heyzine_url');
            $table->string('heyzine_url_ar')->nullable()->after('heyzine_url_en');
            $table->string('cover_image_en')->nullable()->after('cover_image');
            $table->string('cover_image_ar')->nullable()->after('cover_image_en');
            $table->dropColumn(['heyzine_url', 'cover_image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flipbooks', function (Blueprint $table) {
            // Recreate old columns
            $table->string('heyzine_url')->nullable()->after('id');
            $table->string('cover_image')->nullable()->after('heyzine_url');
            
            // Drop language-specific columns
            $table->dropColumn(['heyzine_url_en', 'heyzine_url_ar', 'cover_image_en', 'cover_image_ar']);
        });
    }
};
