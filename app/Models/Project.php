<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'description',
        'images',
        'client_name',
        'client_industry',
        'tech_stack'
    ];

    protected $casts = [
        'tech_stack' => 'array'
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'projects_id', 'id');
    }
}
