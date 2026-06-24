<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'word',
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class)
            ->withPivot(['weight', 'source'])
            ->withTimestamps();
    }
}
