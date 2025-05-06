<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'description',
        'project',
        'category'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category');
    }
}