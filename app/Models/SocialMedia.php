<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'url',
        'icon_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get active social media links ordered by order field
     */
    public static function getActive()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
