<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'chunk',
        'audio_url',
        'file_path',
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
        return $this->belongsTo(User::class);
    }

    public function lyrics(): HasMany
    {
        return $this->hasMany(Lyrics::class);
    }

    public function defaultLyrics()
    {
        return $this->hasOne(Lyrics::class)->where('is_default', true);
    }

    public function chords(): HasMany
    {
        return $this->hasMany(Chord::class);
    }

    public function defaultChord()
    {
        return $this->hasOne(Chord::class)->where('is_default', true);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class)
            ->withPivot(['weight', 'source'])
            ->withTimestamps();
    }

    public function moments()
    {
        return $this->belongsToMany(Moment::class)->withTimestamps();
    }

    public function epochs()
    {
        return $this->belongsToMany(Epoch::class)->withTimestamps();
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)
            ->withPivot(['id', 'number', 'tone'])
            ->withTimestamps();
    }

    public function masses()
    {
        return $this->belongsToMany(Mass::class)
            ->using(MassSong::class)
            ->withPivot(['id', 'moment_id', 'tone', 'position'])
            ->withTimestamps();
    }

    public function embedding()
    {
        return $this->hasOne(SongEmbedding::class);
    }
}
