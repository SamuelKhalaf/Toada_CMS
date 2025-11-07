<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'language',
        'title',
        'description',
        'body',
        'meta_title',
        'meta_description',
    ];

    /**
     * Get the story that owns this translation
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
