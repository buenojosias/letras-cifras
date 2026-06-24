<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MassSong extends Pivot
{
    protected $table = 'mass_songs';

    protected $fillable = [
        'mass_id',
        'song_id',
        'moment_id',
        'tone',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    public function moment()
    {
        return $this->belongsTo(Moment::class);
    }
}
