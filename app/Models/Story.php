<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'featured_image',
        'images',
        'category_en',
        'category_ar',
        'tags',
        'published_at',
        'order',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'tags' => 'array',
        'published_at' => 'datetime',
        'order' => 'integer',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($story) {
            if (empty($story->slug)) {
                $story->slug = Str::slug($story->category_en . '-' . time());
            }
        });
    }

    /**
     * Get translations relationship
     */
    public function translations()
    {
        return $this->hasMany(StoryTranslation::class);
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
     * Get published stories ordered by order and published_at
     */
    public static function getPublished()
    {
        return self::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('order')
            ->orderByDesc('published_at')
            ->get();
    }
}
