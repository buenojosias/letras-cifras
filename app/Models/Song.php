<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Song extends Model
{
    protected $fillable = [
        'title',
        'author',
        'chunk',
        'audio_url',
        'file_path',
        'added_by',
        'accepted',
        'theological_summary',
        'summary_approved',
        'summary_generated_at',
        'summary_model',
    ];

    protected function casts(): array
    {
        return [
            'summary_approved' => 'boolean',
            'summary_generated_at' => 'datetime',
            'accepted' => 'boolean',
        ];
    }

    // user 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function lyrics(): HasMany
    {
        return $this->hasMany(Lyrics::class);
    }
}
