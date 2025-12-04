<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'language',
        'title',
        'description',
        'badge_text',
    ];

    /**
     * Get the project that owns this translation
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
