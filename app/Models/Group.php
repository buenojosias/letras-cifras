<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'church',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('is_leader')->withTimestamps();
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class)
            ->withPivot(['id', 'number', 'tone'])
            ->withTimestamps();
    }

    public function masses()
    {
        return $this->hasMany(Mass::class);
    }
}
