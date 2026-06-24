<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Moment extends Model
{
    protected $fillable = [
        'name',
        'fixed',
    ];

    protected $casts = [
        'fixed' => 'boolean',
    ];

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class)->withTimestamps();
    }

    public function massItems(): HasMany
    {
        return $this->hasMany(MassItem::class);
    }
    }
