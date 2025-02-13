<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'content',
        'tech_stack',
        'code_snippets',
        'thumbnail',
        'publish_date'
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'code_snippets' => 'array',
    ];

    public function getThumbnailUrlAttribute()
    {
        return asset('storage/' . $this->thumbnail);
    }
}
