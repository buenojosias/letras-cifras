<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SongEmbedding extends Model
{
    protected $fillable = [
        'song_id',
        'model',
        'embedding',
    ];

    protected $casts = [
        'embedding' => 'array', // dependendo do driver pgvector
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
