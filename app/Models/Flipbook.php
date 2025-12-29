<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'heyzine_url_en',
        'heyzine_url_ar',
        'cover_image_en',
        'cover_image_ar',
        'published_at',
        'status',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get translations relationship
     */
    public function translations()
    {
        return $this->hasMany(FlipbookTranslation::class);
    }

    /**
     * Get translation for a specific language
     */
    public function translation($language = null)
    {
        $language = $language ?? app()->getLocale();
        return $this->translations()->where('language', $language)->first();
    }

    /**
     * Get published flipbooks ordered by id (database order)
     */
    public static function getPublished()
    {
        return self::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get Heyzine URL for a specific language
     */
    public function getHeyzineUrl($language = null)
    {
        $language = $language ?? app()->getLocale();
        if ($language === 'ar') {
            return $this->heyzine_url_ar ?: $this->heyzine_url_en;
        }
        return $this->heyzine_url_en ?: $this->heyzine_url_ar;
    }

    /**
     * Get cover image URL for a specific language
     */
    public function getCoverImageUrl($language = null)
    {
        $language = $language ?? app()->getLocale();
        if ($language === 'ar') {
            return $this->cover_image_ar ?: $this->cover_image_en;
        }
        return $this->cover_image_en ?: $this->cover_image_ar;
    }
}
