<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chord extends Model
{
    protected $fillable = [
        'song_id',
        'tone',
        'content',
        'version_name',
        'is_default',
        'revised',
        'flagged',
        'added_by',
    ];


    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
            'revised' => 'boolean',
            'flagged' => 'boolean',
        ];
    }

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }

}
