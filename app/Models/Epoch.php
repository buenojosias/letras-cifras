<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Epoch extends Model
{
    protected $fillable = [
        'name',
        'type',
        'priority_level',
    ];

    protected $casts = [
        'priority_level' => 'integer',
    ];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class)->withTimestamps();
    }

    public function masses(): HasMany
    {
        return $this->hasMany(Mass::class);
    }
}
