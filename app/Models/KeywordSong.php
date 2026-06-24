<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class KeywordSong extends Pivot
{
    protected $table = 'group_songs';

    protected $fillable = [
        'group_id',
        'song_id',
        'number',
        'tone',
    ];
}
