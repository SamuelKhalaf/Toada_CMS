<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'featured_image',
        'date_range',
        'location_text',
        'location_url',
        'register_url_ar',
        'register_url_en',
        'tags',
        'published_at',
        'order',
        'status',
    ];

    protected $casts = [
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

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug('project-' . time());
            }
        });
    }

    /**
     * Get translations relationship
     */
    public function translations()
    {
        return $this->hasMany(ProjectTranslation::class);
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
     * Get published projects ordered by order and published_at
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
