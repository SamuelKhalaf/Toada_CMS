<?php

namespace App\Services;

use App\Models\PageContent;
use Illuminate\Support\Facades\Cache;

class ContentService
{
    /**
     * Cache duration in minutes
     */
    protected $cacheDuration = 60;

    /**
     * Get content for a specific page and section in current language
     *
     * @param string $pageName
     * @param string $sectionKey
     * @param string|null $language
     * @return PageContent|null
     */
    public function getPageContent($pageName, $sectionKey, $language = null)
    {
        $language = $language ?? app()->getLocale();
        
        $cacheKey = "page_content_{$pageName}_{$sectionKey}_{$language}";
        
        return Cache::remember($cacheKey, $this->cacheDuration, function () use ($pageName, $sectionKey, $language) {
            return PageContent::getContent($pageName, $sectionKey, $language);
        });
    }

    /**
     * Get content value (text content) for a section
     *
     * @param string $pageName
     * @param string $sectionKey
     * @param string|null $language
     * @param string|null $default
     * @return string
     */
    public function getContent($pageName, $sectionKey, $language = null, $default = null)
    {
        $content = $this->getPageContent($pageName, $sectionKey, $language);
        
        if ($content && $content->content) {
            // If content is JSON, decode it
            $decoded = json_decode($content->content, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $decoded;
            }
            return $content->content;
        }
        
        return $default ?? '';
    }

    /**
     * Get image path for a section
     *
     * @param string $pageName
     * @param string $sectionKey
     * @param string|null $language
     * @return string|null
     */
    public function getImage($pageName, $sectionKey, $language = null)
    {
        $content = $this->getPageContent($pageName, $sectionKey, $language);
        
        if ($content && $content->image_path) {
            return asset('storage/' . $content->image_path);
        }
        
        return null;
    }

    /**
     * Get multiple images for a section
     *
     * @param string $pageName
     * @param string $sectionKey
     * @param string|null $language
     * @return array
     */
    public function getImages($pageName, $sectionKey, $language = null)
    {
        $content = $this->getPageContent($pageName, $sectionKey, $language);
        
        if ($content && $content->images && is_array($content->images)) {
            return array_map(function ($image) {
                return asset('storage/' . $image);
            }, $content->images);
        }
        
        return [];
    }

    /**
     * Clear cache for a specific page
     *
     * @param string $pageName
     * @return void
     */
    public function clearCache($pageName = null)
    {
        if ($pageName) {
            // Clear cache for specific page
            $patterns = ["page_content_{$pageName}_*"];
            $this->clearCacheByPattern($patterns);
        } else {
            // Clear all page content cache
            Cache::flush();
        }
    }

    /**
     * Clear cache by pattern
     *
     * @param array $patterns
     * @return void
     */
    protected function clearCacheByPattern(array $patterns)
    {
        // Note: This is a simplified version. For production, consider using Redis tags or similar
        foreach ($patterns as $pattern) {
            // Clear cache manually - Laravel doesn't support pattern-based cache clearing out of the box
            // This would need Redis tags or a custom cache implementation for production
        }
    }
}

