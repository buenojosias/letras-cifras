<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MassItem extends Model
{
    protected $fillable = [
        'mass_id',
        'moment_id',
        'song_id',
        'title',
        'content',
        'tone',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    public function mass()
    {
        return $this->belongsTo(Mass::class);
    }

    public function moment()
    {
        return $this->belongsTo(Moment::class);
    }

    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    /*
     * Identifica rapidamente se é um item personalizado
     */
    public function isCustom(): bool
    {
        return is_null($this->song_id);
    }
}
