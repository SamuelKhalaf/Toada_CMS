<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsightTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'insight_id',
        'language',
        'title',
        'description',
        'body',
        'meta_title',
        'meta_description',
    ];

    /**
     * Get the insight that owns this translation
     */
    public function insight()
    {
        return $this->belongsTo(Insight::class);
    }
}
