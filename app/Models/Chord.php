<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chord extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'song_id',
        'tone',
        'content',
        'version_name',
        'is_default',
        'revised',
        'flagged',
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
        return $this->belongsTo(User::class);
    }

}
