<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MassEmbedding extends Model
{
    protected $fillable = [
        'mass_id',
        'model',
        'embedding',
    ];

    protected $casts = [
        'embedding' => 'array',
    ];

    public function mass()
    {
        return $this->belongsTo(Mass::class);
    }
}
