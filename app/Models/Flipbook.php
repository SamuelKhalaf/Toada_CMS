<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'heyzine_url',
        'cover_image',
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
}
