<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlipbookTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'flipbook_id',
        'language',
        'title',
        'subtitle',
    ];

    /**
     * Get the flipbook that owns this translation
     */
    public function flipbook()
    {
        return $this->belongsTo(Flipbook::class);
    }
}
