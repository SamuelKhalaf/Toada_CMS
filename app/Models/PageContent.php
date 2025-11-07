<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'section_key',
        'content_type',
        'language',
        'content',
        'image_path',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    /**
     * Get content for a specific page and section in a language
     */
    public static function getContent($pageName, $sectionKey, $language = null)
    {
        $language = $language ?? app()->getLocale();
        
        return self::where('page_name', $pageName)
            ->where('section_key', $sectionKey)
            ->where('language', $language)
            ->first();
    }
}
