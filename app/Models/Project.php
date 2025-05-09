<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'category'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project');
    }
}